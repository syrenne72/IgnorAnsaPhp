<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = new News();
        return view('/journal/home', compact('news'));
    }

    public function salute() {
        $news = new News();
        return view('/journal/salute', compact('news'));
    }

    public function show(\App\Models\News $news) {
        return view('/journal/single', compact('news'));
    }
}
