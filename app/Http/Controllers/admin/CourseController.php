<?php

namespace App\Http\Controllers\admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CourseCategory;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{

    public function index()
    {
        $allcourses = Course::paginate(10);
        return view('admin.course.index', compact('allcourses'));
    }

    public function add()
    {
        $coursecategories = CourseCategory::all();
        // dd($courseCategory);
        return view('admin.course.add', compact('coursecategories'));
    }

    public function addSubmit(Request $request)
    {

        $request->validate([
            'course_image' => 'required',
            'title' => 'required',
            'category' => 'required',
        ]);

        $file = null;
        $image = null;

        // dd($request);

        if ($request->hasFile('course_image')) {
            $requestedfile = $request->course_image;
            $image = time() . $requestedfile->GetClientOriginalName();
            $path = public_path('images/course');
            $requestedfile->move($path, $image);
            $image = 'images/course/' . $image;
        }

        if ($request->hasFile('course_file')) {
            $requestedfile = $request->course_file;
            $file = time() . $requestedfile->GetClientOriginalName();
            $path = public_path('files/course');
            $requestedfile->move($path, $file);
            $file = 'files/course/' . $file;
        }

        Course::create([
            'title' => $request->title,
            'image' => $image,
            'file' => $file,
            'category_id'=>$request->category,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success', 'Successully Added!!');
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $coursecategories=CourseCategory::all();
        return view('admin.course.edit', compact('course','coursecategories'));
    }

    public function editsubmit($id, Request $request)
    {



        $course = Course::findOrFail($id);
        $course->title = $request->title;
        if ($request->hasFile('course_image')) {
            if (File::exists(public_path($course->image))) {
                File::delete(public_path($course->image));
            }
            $requestedfile = $request->course_image;
            $image = time() . $requestedfile->GetClientOriginalName();
            $path = public_path('images/course');
            $requestedfile->move($path, $image);
            $course->image = 'images/course/' . $image;
        }
        if ($request->hasFile('course_file')) {
            if (File::exists(public_path($course->file))) {
                File::delete(public_path($course->file));
            }
            $requestedfile = $request->course_file;
            $file= time() . $requestedfile->GetClientOriginalName();
            $path = public_path('files/course');
            $requestedfile->move($path, $file);
            $course->file= 'files/course/' . $file;
        }
        $course->category_id=$request->category;
        $course->description = $request->description;
        $course->update();
        return redirect()->back()->with('success', 'Course Edited Successfully!!!');
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        if (File::exists(public_path($course->image))) {
            File::delete(public_path($course->image));
        }
        if (File::exists(public_path($course->file))) {
            File::delete(public_path($course->file));
        }
        $course->delete();
        return redirect()->back()->with('error', 'Course Deleted Successfully!!!');
    }
}
