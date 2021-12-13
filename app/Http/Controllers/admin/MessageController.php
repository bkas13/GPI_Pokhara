<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{
    public function index(){
        $messages = Messages::orderBy('priority','asc')->get();
        return view('admin.message.allmessage',compact('messages'));
    }


    public function add(){
        return view('admin.message.addmessage');
    }

    public function addSubmit(Request $request){
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'priority'=> 'required|numeric|gt:0',
        ]);

        if($request->hasFile('image')){
            $requestedfile = $request->image;
            $image = time().$requestedfile->GetClientOriginalName();
            $path = public_path('images\messages');
            $requestedfile->move($path,$image);
            $image = 'images/messages/'.$image;
        }


        Messages::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'image' => isset($image) ? $image : "",
            'desc' => $request->description ?? "",
            'designation' => $request->designation ?? "",
            'name' => $request->name,

        ]);
        return redirect()->back()->with('success','Successully Added!!');
    }

    public function edit($id){
        $message = Messages::findOrFail($id);
        return view('admin.message.edit',compact('message'));
    }

    public function editsubmit($id,Request $request){

        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'priority' => 'required|numeric|gt:0',
        ]);
        $message = Messages::findOrFail($id);
        $message->title = $request->title;
        if($request->hasFile('image')){
            if(File::exists(public_path($message->image))){
                File::delete(public_path($message->image));
            }
            $requestedfile = $request->image;
            $image = time().$requestedfile->GetClientOriginalName();
            $path = public_path('images/messages');
            $requestedfile->move($path,$image);
            $message->image = 'images/messages/'.$image;
        }
        $message->desc = $request->description;
        $message->designation = $request->designation;
        $message->priority = $request->priority;
        $message->name = $request->name;
        $message->update();
        return redirect()->back()->with('success','Course Edited Successfully!!!');

    }

    public function delete($id){
        $message = Messages::findOrFail($id);
        if(File::exists(public_path($message->image))){
            File::delete(public_path($message->image));
        }
        $message->delete();
        return redirect()->back()->with('error','Course Deleted Successfully!!!');
    }


}
