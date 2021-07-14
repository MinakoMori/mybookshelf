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
        } elseif ($book_status == "5") {
            $book_status = str_replace("5", "ゴミ箱", $book_status);
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
        }
        
        $tag = Tag::where('book_id', $request->id)->first()->tag;
        
        return view('admin.books.deta', [
            'book_form' => $book,
            'book_status' => $book_status,
            'book_category' => $book_category,
            'book_tag' => $tag
            ]);
    }
}
