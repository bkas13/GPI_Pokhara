<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Career;
use App\Model\Event;
use App\Model\News;
use Illuminate\Database\Eloquent\Collection;

class CareerController extends Controller
{
    public function career()
    {
        // dd('inside function');
        $careers=Career::where('status','active')->get();

        $context = new Collection();
        $context->careers = Career::where('status', 'active')->orderBy('created_at', 'desc')->get();
        $context->recent_news = News::where('school_id', 1)->where('status', 1)->orderBy('created_at', 'desc')->get()->take(5);
        $context->recent_events = Event::where('school_id', 1)->where('status', 1)->orderBy('created_at', 'desc')->get()->take(5);
        return view('front.content.career', compact('context','careers'));
    }
    public function singleCareer($id, $date)
    {
        // dd($id);
        $context = new Collection();
        $context->recent_careers = Career::where('status', 'active')->where('id', '!=', $id)->orderBy('created_at', 'desc')->get()->take(5);
        $career= Career::findOrFail($id);
        return view('front.content.single-career', compact('career', 'context'));
    }
}
