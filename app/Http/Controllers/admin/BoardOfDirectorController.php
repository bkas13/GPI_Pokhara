<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ethnicity;
use App\BoardOfDirector;
use Illuminate\Support\Facades\File;

class BoardOfDirectorController extends Controller
{
    public function index(){
        $contents = BoardOfDirector::all();
        return view('admin.boardofdirector.index',compact('contents'));
    }


    public function add(){
        return view('admin.boardofdirector.add');
    }

    public function store(Request $request){
        $staff = new BoardOfDirector();
        $staff->school_id = 1;
        $staff->name = $request->name;
        $staff->job_title = $request->job_title;
        $staff->join_date = $request->join_date ;
        $staff->address = $request->address;
        $staff->gender = $request->gender;
        $staff->DOB = $request->DOB;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/boardofdirectors/');
            $staff->image = $db_path;
        }

        if($staff->save()) {
            return redirect()->route('admin.boardsofdirector.all')->with('success','New Staff Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Staff Add Failed');
        }

    }

    public function edit($staff_slug){
        if($staff = BoardOfDirector::where('slug',$staff_slug)->first()) {
            $ethnicities = Ethnicity::all();
            return view('admin.boardofdirector.edit',compact('staff','ethnicities'));
        }
        else{
            return redirect()->back();
        }

    }

    public function update(Request $request, $staff_slug){
        $staff = BoardOfDirector::where('slug',$staff_slug)->first();

        $staff->name = $request->name;
        $staff->job_title = $request->job_title;
        $staff->join_date = $request->join_date ;
        $staff->address = $request->address;
        $staff->gender = $request->gender;
        $staff->DOB = $request->DOB;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->description = $request->description;

        if($request->hasFile('image')){
            if(File::exists(public_path($staff->image))){
                File::delete(public_path($staff->image));
            }
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/boardofdirectors/');
            $staff->image = $db_path;
        }
        $save = $staff->update();

        if($save) {

            return redirect()->route('admin.boardsofdirector.all')->with('success','Staff Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Edit Failed');
        }

    }

    public function view($staff_slug){
        if($staff = BoardOfDirector::where('slug',$staff_slug)->first()) {
            return view('admin.boardofdirector.details', compact('staff'));
        }
        else{
            return redirect()->back();
        }
    }

    public function delete($staff_slug){
        $staff = BoardOfDirector::where('slug',$staff_slug)->first();
        if(File::exists(public_path($staff->image))){
            File::delete(public_path($staff->image));
        }
        $staff->delete();
        return redirect()->back()->with('success','Deleted Successfully!!!');

    }



}
