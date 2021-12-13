<?php

namespace App\Http\Controllers\admin;

use App\Model\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\File;

class CourseCategoryController extends Controller
{

    public function index()
    {
        // dd('controller');
        $courseCategory = CourseCategory::all();
        return view('admin.course_category.index', compact('courseCategory'));
    }

    public function add()
    {
        return view('admin.course_category.add');
    }

    public function addSubmit(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);
        // dd($request);
        CourseCategory::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Successully Added!!');
    }


    public function edit($id)
    {
        $courseCategory = CourseCategory::findOrFail($id);
        return view('admin.course_category.edit', compact('courseCategory'));
    }

    public function editsubmit($id, Request $request)
    {
        $course = CourseCategory::findOrFail($id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->update();
        return redirect()->back()->with('success', 'Category Edited Successfully!!!');
    }

    public function delete($id)
    {
        $courseCategory = CourseCategory::findOrFail($id);

        if ($courseCategory->courses->count() > 0) {
            return redirect()->back()->with('error', 'Category has courses. Delete courses first!');
        }
        $courseCategory->delete();
        return redirect()->back()->with('error', 'Category Deleted Successfully!!!');
    }
}
