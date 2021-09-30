<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

     public function home()
    {
        if (Auth::user()) {
            return redirect('admin/home');
        } else {
            return view('welcome');
        }
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Book::where('user_id',Auth::id())->get()->sortByDesc('updated_at');
        
        //$user = User::where('id',Auth::id())->get();
        
        return view('home', [
            'posts' => $posts,
            //'user' => $user,
            'sortTypeNew' => "asc",
            'sortTypeRank' => "asc"
        ]);
    }
    
    public function sort_new(Request $request)
    {
        $sortType = $request['sortType'];
        
        if($sortType == 'asc') {
            $posts = Book::where('user_id',Auth::id())->orderBy('buy_date','asc')->get();
            $sortType = "desc";
        } else {
            $posts = Book::where('user_id',Auth::id())->orderBy('buy_date','desc')->get();
            $sortType = "asc";
        }
        
        return view('home', [
            'posts' => $posts,
            'sortTypeNew' => $sortType,
            'sortTypeRank' => "asc"
        ]);
    }
    
    public function sort_rank(Request $request)
    {
        $sortType = $request['sortType'];
        //dd($sortType);
        if($sortType == 'asc') {
            $posts = Book::where('user_id',Auth::id())->orderBy('evaluation','asc')->get();
            $sortType = "desc";
        } else {
            $posts = Book::where('user_id',Auth::id())->orderBy('evaluation','desc')->get();
            $sortType = "asc";
        }
        
        return view('home', [
            'posts' => $posts,
            'sortTypeNew' => "asc",
            'sortTypeRank' => $sortType
        ]);
    }
}
