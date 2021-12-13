<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Faq;

class FAQController extends Controller
{
    public function index(){
        $faqs = Faq::all();
        return view('admin.faq.index',compact('faqs'));
    }

    public function add(){
        return view('admin.faq.add');
    }

    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $faq =Faq::create([
            'title' => $request->title,
            'status' => $request->status,
            'desc' => $request->description
        ]);
        if($faq){
            return redirect()->route('admin.faq.all')->with('success','added successfully');
        }else{
            return redirect()->back()->with('error','Failure!!');
        }
    }

    public function edit($id){
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit',compact('faq'));

    }

    public function editsubmit($id,Request $request){
        $faq = Faq::findOrFail($id);
        $faq->title = $request->title;
        $faq->status = $request->status;
        $faq->desc = $request->description;
        $faq->update();
        return redirect()->back()->with('success','edited successfully!!');
    }

    public function delete($id){
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success','Deleted successfully!!');
    }





}
