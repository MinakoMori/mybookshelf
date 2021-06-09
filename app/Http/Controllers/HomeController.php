<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Book::all()->sortByDesc('updated_at');
        
        return view('home', ['posts' => $posts]);
    }
    
    public function posts(Request $request)
    {
        $posts = Book::all()->sortByDesc('updated_at');
        
        return view('home', ['posts' => $posts]);
    }
}
