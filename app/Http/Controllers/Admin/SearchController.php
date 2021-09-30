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
        // 変数の格納処理
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
        
        // SQLの組み上げ処理開始
        $query = Book::query();
        
        $firstWhereFlg = 0;
        $secondWhereFlg = 0;
        $where = array();
        
        // SQLの組み上げ処理（sqlqct 部分）
        $sql = 'SELECT * FROM `books`';
        
        // SQLの組み上げ処理（whereの大外部分）
        if ($keyword_title != null) {
            $sql .= ' WHERE title LIKE ? ';
            array_push($where,'%'.$keyword_title.'%');
            $firstWhereFlg = 1;
        }
        if ($keyword_author != null) {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE author LIKE ? ';
                $firstWhereFlg = 1;
            } else {
                $sql .= 'AND author LIKE ? ';
            }
            array_push($where,'%'.$keyword_author.'%');
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
        
        // SQLの組み上げ処理（whereの入れ子部分）
        if ($keyword_genre_friendship == "on") {
            if ($firstWhereFlg == 0) {
                $sql .= ' WHERE genre_friendship = ?';
                $secondWhereFlg = 1;
            } else {
                $sql .= 'AND (genre_friendship = ?';
                $secondWhereFlg = 2;
            }
            array_push($where,"1");
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
            array_push($where,"1");
        }
        if ($keyword_genre_action == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_action = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_action = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_action = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_sf_horror == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_sf_horror = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_sf_horror = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_sf_horror = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_mystery == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_mystery = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_mystery = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_mystery= ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_fantasy == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_fantasy = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_fantasy = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_fantasy = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_history == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_history = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_history = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_history = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_nonfiction == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_nonfiction = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_nonfiction = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_nonfiction = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_essay == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_essay = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_essay = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_essay = ?';
            }
            array_push($where,"1");
        }
        if ($keyword_genre_business == "on") {
            if ($firstWhereFlg == 0 && $secondWhereFlg == 0) {
                $sql .= ' WHERE genre_business = ?';
                $secondWhereFlg = 1;
            } elseif ($firstWhereFlg == 1 && $secondWhereFlg == 0) {
                $sql .= 'AND (genre_business = ?';
                $secondWhereFlg = 2;
            } elseif ($secondWhereFlg != 0) {
                $sql .= ' OR genre_business = ?';
            }
            array_push($where,"1");
        }
        
        if ($secondWhereFlg == 2) {
                $sql .= ')';
        }
        
        // SQLの実行
        $posts = DB::select($sql,$where);
        
        //$posts = $query->orderBy('created_at', 'desc')->get();
        //dd(DB::getQueryLog());
        
        // リターン先の分岐処理
        if($request->method() == 'GET'){
            return view('admin.books.search', [ 'posts' => $posts ]);
        } else {
            return view('home', [ 
                'posts' => $posts,
                'sortTypeNew' => "asc",
                'sortTypeRank' => "asc"
            ]);
        }
    }
    
    public function searchTag(Request $request)
    {
        $arrTag = array();
        $tag = $request['tag'];
        $tag = str_replace('#', '', $tag);
        $tags = Tag::where('tag',$tag)->get(['book_id'])->toArray();
        
        foreach($tags as $tag){
            array_push($arrTag,$tag['book_id']);
        }
        
        $posts = Book::whereIn('id',$arrTag)->get();
        
        return view('home', [ 
            'posts' => $posts,
            'sortTypeNew' => "asc",
            'sortTypeRank' => "asc"
        ]);
    }
}
