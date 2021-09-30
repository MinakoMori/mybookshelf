<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use App\Tag;

class CreateController extends Controller
{
    public function add()
    {
        return view('admin.books.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Book::$rules);
        $books = new Book;
        $form = $request->all();
        $str_tag = str_replace(array(" ", "　"), "", $form['tag']);
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $books->image_path = basename($path);
        } else {
            $books->image_path = null;
        }
        
        //dd($form);
        
        unset($form['_token']);
        unset($form['image']);
        unset($form['tag']);
        
        //$user_id = User::all()->get(id);
        //$user_id = $books;
        
        $books->fill($form);
        $books->save();
        
        //$this->insert_tag($str_tag, $books['id']);
        // タグの登録処理
        if ($str_tag != "") {
            $arr_tags = explode("#", $str_tag);
            $arr_tags = array_filter($arr_tags, 'strlen');
            
            foreach($arr_tags as $tag) {
                $model_tags = new Tag;
                $model_tags['tag'] = $tag;
                $model_tags['book_id'] = $books['id'];
                $model_tags->save();
            }
        }
        
        return redirect('admin/home');
    }
    
    //public function insert_tag($str_tag, $book_id)
    //{
        // タグの登録処理
    //    if ($str_tag != "") {
    //        $arr_tags = explode("#", $str_tag);
    //        $arr_tags = array_filter($arr_tags, 'strlen');
            
    //        foreach($arr_tags as $tag) {
    //            $model_tags = new Tag;
    //            $model_tags['tag'] = $tag;
    //            $model_tags['book_id'] = $books['id'];
    //            $model_tags->save();
    //        }
    //    }
    //}
    
    public function index(Request $request)
    {
        $cond_image = $request->cond_image;
        if ($cond_image != '') {
            $posts = Book::where('image', $cond_image)->get();
        } else {
            $posts = Book::all();
        }
        return view('home', ['posts' => $posts, 'cond_image' => $cond_image]);
    }
}
