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
        $keyword_title = $request->input('title');
        $keyword_author = $request->input('author');
        $keyword_status = $request->input('status');
        $keyword_category = $request->input('category');
        $keyword_genre_friendship = $request->input('genre_friendship');
        $keyword_genre_love = $request->input('genre_love');
        $keyword_genre_action = $request->input('genre_action');
        $keyword_genre_sf_horror = $request->input('genre_sf_horror');
        $keyword_genre_mystery = $request->input('genre_mystery');
        $keyword_genre_fantasy = $request->input('genre_fantasy');
        $keyword_genre_history = $request->input('genre_history');
        $keyword_genre_nonfiction = $request->input('genre_nonfiction');
        $keyword_genre_essay = $request->input('genre_essay');
        $keyword_genre_business = $request->input('genre_business');
        //dd($keyword_genre_fantasy);
        $query = Book::query();
        
        if (isset($keyword_title)) {
            $query->where('title', 'like', '%' . $keyword_title . '%');
        } if (isset($keyword_author)) {
            $query->where('author', 'like', '%' . $keyword_author . '%');
        } if ($keyword_status != 0) {
            $query->where('status', $keyword_status);
        } if ($keyword_category != 0) {
            $query->where('category', $keyword_category);
        } if (isset($keyword_genre_friendship)) {
            $query->orWhere('genre_friendship', 1);
        } if (isset($keyword_genre_love)) {
            $query->orWhere('genre_love', 1);
        } if (isset($keyword_genre_action)) {
            $query->orWhere('genre_action', 1);
        } if (isset($keyword_genre_sf_horror)) {
            $query->orWhere('genre_sf_horror', 1);
        } if (isset($keyword_genre_mystery)) {
            $query->orWhere('genre_mystery', 1);
        } if (isset($keyword_genre_fantasy)) {
            $query->orWhere('genre_fantasy', 1);
        } if (isset($keyword_genre_history)) {
            $query->orWhere('genre_history', 1);
        } if (isset($keyword_genre_nonfiction)) {
            $query->orWhere('genre_nonfiction', 1);
        } if (isset($keyword_genre_essay)) {
            $query->orWhere('genre_essay', 1);
        } if (isset($keyword_genre_business)) {
            $query->orWhere('genre_business', 1);
        } else {
            $posts = Book::all();
        }
        $posts = $query->orderBy('created_at', 'desc')->get();
        //dd($keyword_title,$keyword_author,$keyword_status,$keyword_category,$keyword_genre_friendship,$keyword_genre_love,$keyword_genre_action,$keyword_genre_sf_horror,$keyword_genre_mystery,$keyword_genre_fantasy,$keyword_genre_history,$keyword_genre_nonfiction,$keyword_genre_essay,$keyword_genre_business,$posts);
        
        if($request->method() == 'GET'){
            return view('admin.books.search', [ 'posts' => $posts ]);
        } else {
            return view('home', [ 'posts' => $posts ]);
        }
    }
}
