<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Career;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        $contents = Career::all();
        return view('admin.career.index', compact('contents'));
    }

    public function add()
    {
        return view('admin.career.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request);
        $career = new Career();
        $career->title = $request->title;
        $career->content = $request->contents;
        $career->status  = $request->status;
        $file = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/career/', $filename);
            $db_filename = 'admin/career/' . $filename;
            $career->file = $db_filename;
        }
        if ($career->save()) {
            return redirect()->back()->with('success', 'New Career Added Successfully');
        } else {
            return redirect()->back()->with('error', 'New Career Add Failed');
        }
    }

    public function edit($career_slug)
    {
        if ($career = Career::where('slug', $career_slug)->first()) {
            return view('admin.career.edit', compact('career'));
        } else {
            return redirect()->back()->with('error', 'Career Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $career_slug)
    {
        //    dd($request);
        $validator = Validator::make($request->all(), [
            'file' => 'nullable|mimes:pdf',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $career = Career::where('slug', $career_slug)->first();
        $career->title = $request->title;
        $career->content = $request->contents;
        $career->status  = $request->status;
        $file = null;

        if ($request->hasFile('file')) {
            $file_path = public_path() . '/' . $career->file;
            if ($career->file &&  file_exists($file_path)) {
                unlink($file_path);
            }
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/career/', $filename);
            $db_filename = 'admin/career/' . $filename;
            $career->file = $db_filename;
        }

        if ($career->save()) {
            return redirect()->back()->with('success', 'Career Edited Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to edit Career');
        }
    }

    public function delete(Request $request)
    {
        if ($career = Career::findOrFail($request->career_id)) {
            $file_path = public_path() . '/' . $career->file;
            $thumbnail_path = public_path() . '/thumbnail/' . $career->file;
            // dd($file_path);
            if ($career->file &&  file_exists($file_path)) {
                unlink($file_path);
            }
            $career->delete();
            return redirect()->back()->with('success', 'Career Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Career Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($career_id)
    {
        $career = Career::find($career_id);
        if ($career->status == "Active") {
            $career->status = "Inactive";
        } else {
            $career->status = "Active";
        }
        $return = $career->update();

        return redirect()->back()->with('success', 'Status Changed');
    }
}
