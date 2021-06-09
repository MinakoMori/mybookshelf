<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tag;

class SearchController extends Controller
{
    public function add()
    {
        return view('admin.books.search');
    }
    
    public function index(Request $request)
    {
        $keyword_title = $request->title;
        if ($keyword_title != '') {
            $posts = Book::where('title', 'like', "%$keyword_title%")->get();
        } else {
            $posts = Book::all();
        }
        return view('admin.books.search', ['posts' => $posts, 'keyword_title' => $keyword_title]);
    }
}
