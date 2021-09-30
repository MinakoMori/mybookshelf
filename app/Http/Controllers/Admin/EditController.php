<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tag;

class EditController extends Controller
{
    public function edit(Request $request)
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
        
        $book_evaluation = Book::find($request->id)->evaluation;
        if ($book_evaluation == "0") {
            $book_evaluation = str_replace("0", "-", $book_evaluation);
        } elseif ($book_evaluation == "1") {
            $book_evaluation = str_replace("1", "★", $book_evaluation);
        } elseif ($book_evaluation == "2") {
            $book_evaluation = str_replace("2", "★★", $book_evaluation);
        } elseif ($book_evaluation == "3") {
            $book_evaluation = str_replace("3", "★★★", $book_evaluation);
        } elseif ($book_evaluation == "4") {
            $book_evaluation = str_replace("4", "★★★★", $book_evaluation);
        } elseif ($book_evaluation == "5") {
            $book_evaluation = str_replace("5", "★★★★★", $book_evaluation);
        }
        
        $book_tags = Tag::where('book_id', $request->id)->first();
        
        return view('admin.books.edit', [
            'book_status' => $book_status,
            'book_evaluation' => $book_evaluation,
            'book_form' => $book,
            'book_tags' => $book_tags
        ]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Book::$rules);
        
        if (isset($_POST['delete'])) {
            Book::find($request->id)->delete();
            Tag::where('book_id', $request->id)->delete();
        
            return redirect('admin/home');
        }
        
        $book = Book::find($request->id);
        $book_form = $request->all();
        
        if ($request->remove == 'true') {
            $book_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $book_form['image_path'] = basename($path);
        } elseif ($request->file('image')) {
            $book_form['image_path'] = $book->image_path;
        }
        
        $str_tag = str_replace(array(" ", "　"), "", $book_form['tag']);
        
        if (!isset($book_form['genre_friendship'])) {
            $book_form['genre_friendship'] = null;
        }
        if (!isset($book_form['genre_love'])) {
            $book_form['genre_love'] = null;
        }
        if (!isset($book_form['genre_action'])) {
            $book_form['genre_action'] = null;
        }
        if (!isset($book_form['genre_sf_horror'])) {
            $book_form['genre_sf_horror'] = null;
        }
        if (!isset($book_form['genre_mystery'])) {
            $book_form['genre_mystery'] = null;
        }
        if (!isset($book_form['genre_fantasy'])) {
            $book_form['genre_fantasy'] = null;
        }
        if (!isset($book_form['genre_history'])) {
            $book_form['genre_history'] = null;
        }
        if (!isset($book_form['genre_nonfiction'])) {
            $book_form['genre_nonfiction'] = null;
        }
        if (!isset($book_form['genre_essay'])) {
            $book_form['genre_essay'] = null;
        }
        if (!isset($book_form['genre_business'])) {
            $book_form['genre_business'] = null;
        }
        //dd($book_form);
        
        unset($book_form['image']);
        unset($book_form['remove']);
        unset($book_form['_token']);
        unset($book_form['tag']);
        unset($book_form['update']);
        unset($book_form['delete']);
        
        $book->fill($book_form)->save();
        
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
        
        Tag::where('book_id', $request->id)->delete();
        
        $this->insert_tag($str_tag, $request->id);
        
        $book_tags = Tag::where('book_id', $request->id)->get();
        
        return view('admin.books.deta', [
            'book_form' => $book,
            'book_status' => $book_status,
            'book_category' => $book_category,
            'book_genre_friendship' => $book_genre_friendship,
            'book_genre_love' => $book_genre_love,
            'book_genre_action' => $book_genre_action,
            'book_genre_sf_horror' => $book_genre_sf_horror,
            'book_genre_mystery' => $book_genre_mystery,
            'book_genre_fantasy' => $book_genre_fantasy,
            'book_genre_history' => $book_genre_history,
            'book_genre_nonfiction' => $book_genre_nonfiction,
            'book_genre_essay' => $book_genre_essay,
            'book_genre_business' => $book_genre_business,
            'book_tags' => $book_tags
            ]);

    }
    
    public function insert_tag($str_tag, $book_id)
    {
        // タグの登録処理
        if ($str_tag != "") {
            $arr_tags = explode("#", $str_tag);
            $arr_tags = array_filter($arr_tags, 'strlen');
            
            foreach($arr_tags as $tag) {
                $model_tags = new Tag;
                $model_tags['tag'] = $tag;
                $model_tags['book_id'] = $book_id;
                $model_tags->save();
            }
        }
    }
}
