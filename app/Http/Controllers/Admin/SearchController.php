<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tag;
use DB;

class SearchController extends Controller
{
    public $keyword_genre_friendship;
    
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
        $keyword_evaluation = $request->input('evaluation');
        $keyword_memo = $request->input('memo');
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
        DB::enableQueryLog();
        $query = Book::query();
        
        $firstWhereFlg = 0;
        $secondWhereFlg = 0;
        $where = array();
        
        $sql = 'SELECT * FROM `books`';
        //dd($keyword_status);
        if ($keyword_title != null) {
            $sql .= ' WHERE title = ? ';
            array_push($where,$keyword_title);
            $firstWhereFlg = 1;
        }
        if ($keyword_author != null) {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE author = ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND author = ? ';
            }
            array_push($where,$keyword_author);
        }
        if ($keyword_status != "0") {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE status = ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND status = ? ';
            }
            array_push($where,$keyword_status);
        }
        if ($keyword_category != "0") {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE category = ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND category = ? ';
            }
            array_push($where,$keyword_category);
        }
        if ($keyword_evaluation != "0") {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE evaluation = ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND evaluation = ? ';
            }
            array_push($where,$keyword_evaluation);
        }
        if ($keyword_memo == 2) {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE memo = ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND memo = ? ';
            }
            array_push($where,$keyword_memo);
        }
        
        if ($keyword_genre_friendship == "on") {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE genre_friendship = ?';
                $secondWhereFlg = 1;
            } else {
                $sql .= 'AND (genre_friendship = ?';
                $secondWhereFlg = 2;
            }
            array_push($where,$keyword_genre_friendship);
        }
        
        if ($keyword_genre_love == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_love = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_love = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_love = ?';
            }
            array_push($where,$keyword_genre_love);
        }
        
        if ($secondWhereFlg == 2) {
                $sql .= ')';
        }
        
        //$sql .= 'WHERE status = ? AND title = ? AND (genre_friendship = ? OR genre_mystery = ?)';
        
        $posts = DB::select($sql,$where);
        //dd($keyword_status);
        
        $posts = $query->orderBy('created_at', 'desc')->get();
        //dd(DB::getQueryLog());
        //dd(DB::getQueryLog(),$keyword_title,$keyword_author,$keyword_status,$keyword_category,$keyword_evaluation,$keyword_memo,$keyword_genre_friendship,$keyword_genre_love,$posts);
        //dd($keyword_genre_friendship,$posts);
        
        if($request->method() == 'GET'){
            return view('admin.books.search', [ 'posts' => $posts ]);
        } else {
            return view('home', [ 'posts' => $posts ]);
        }
    }
}
