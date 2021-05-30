<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

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
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $books->image_path = basename($path);
        } else {
            $books->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $books->fill($form);
        $books->save();
        
        return redirect('admin/books/create');
    }
    
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
