<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use Illuminate\Routing\Controller as BaseController;

class SpaController extends BaseController
{
    /**
     * Renders the main app screen
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('index');
    }

    public function getData()
    {
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return response()->json(['events' => $events, 'blogs' => $blogs], 200);
    }
}
