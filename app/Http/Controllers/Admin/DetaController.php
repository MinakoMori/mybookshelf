<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tag;

class DetaController extends Controller
{
    public function index(Request $request)
    {
        $book = Book::find($request->id);
        if (empty($book)) {
            abort(404);
        }
        
        $book_status = Book::find($request->id)->status;
        if ($book_status == "1") {
            $book_status = str_replace("1", "読みたい", $book_status);
        } elseif ($book_status == "2") {
            $book_status = str_replace("2", "購入済み", $book_status);
        } elseif ($book_status == "3") {
            $book_status = str_replace("3", "読書中", $book_status);
        } elseif ($book_status == "4") {
            $book_status = str_replace("4", "読了", $book_status);
        }
        
        $book_category = Book::find($request->id)->category;
        if ($book_category == "1") {
            $book_category = str_replace("1", "小説", $book_category);
        } elseif ($book_category == "2") {
            $book_category = str_replace("2", "漫画", $book_category);
        } elseif ($book_category == "3") {
            $book_category = str_replace("3", "雑誌", $book_category);
        } elseif ($book_category == "4") {
            $book_category = str_replace("4", "図鑑", $book_category);
        } elseif ($book_category == "5") {
            $book_category = str_replace("5", "その他", $book_category);
        }
        
        $book_genre_friendship = Book::find($request->id)->genre_friendship;
        if ($book_genre_friendship == "1") {
            $book_genre_friendship = str_replace("1", "友情", $book_genre_friendship);
        }
        
        $book_genre_love = Book::find($request->id)->genre_love;
        if ($book_genre_love == "1") {
            $book_genre_love = str_replace("1", "恋愛", $book_genre_love);
        }
        
        $book_genre_action = Book::find($request->id)->genre_action;
        if ($book_genre_action == "1") {
            $book_genre_action = str_replace("1", "アクション", $book_genre_action);
        }
        
        $book_genre_sf_horror = Book::find($request->id)->genre_sf_horror;
        if ($book_genre_sf_horror == "1") {
            $book_genre_sf_horror = str_replace("1", "SF・ホラー", $book_genre_sf_horror);
        }
        
        $book_genre_mystery = Book::find($request->id)->genre_mystery;
        if ($book_genre_mystery == "1") {
            $book_genre_mystery = str_replace("1", "ミステリー", $book_genre_mystery);
        }
        
        $book_genre_fantasy = Book::find($request->id)->genre_fantasy;
        if ($book_genre_fantasy == "1") {
            $book_genre_fantasy = str_replace("1", "ファンタジー", $book_genre_fantasy);
        }
        
        $book_genre_history = Book::find($request->id)->genre_history;
        if ($book_genre_history == "1") {
            $book_genre_history = str_replace("1", "歴史", $book_genre_history);
        }
        
        $book_genre_nonfiction = Book::find($request->id)->genre_nonfiction;
        if ($book_genre_nonfiction == "1") {
            $book_genre_nonfiction = str_replace("1", "ノンフィクション", $book_genre_nonfiction);
        }
        
        $book_genre_essay = Book::find($request->id)->genre_essay;
        if ($book_genre_essay == "1") {
            $book_genre_essay = str_replace("1", "エッセイ", $book_genre_essay);
        }
        
        $book_genre_business = Book::find($request->id)->genre_business;
        if ($book_genre_business == "1") {
            $book_genre_business = str_replace("1", "ビジネス", $book_genre_business);
        }
        
        $tags = Tag::where('book_id', $request->id)->get();
        
        return view('admin.books.deta', [
            'book_form' => $book,
            'book_status' => $book_status,
            'book_category' => $book_category,
            'book_tags' => $tags,
            'book_genre_friendship' => $book_genre_friendship,
            'book_genre_love' => $book_genre_love,
            'book_genre_action' => $book_genre_action,
            'book_genre_sf_horror' => $book_genre_sf_horror,
            'book_genre_mystery' => $book_genre_mystery,
            'book_genre_fantasy' => $book_genre_fantasy,
            'book_genre_history' => $book_genre_history,
            'book_genre_nonfiction' => $book_genre_nonfiction,
            'book_genre_essay' => $book_genre_essay,
            'book_genre_business' => $book_genre_business
            ]);
    }
}
