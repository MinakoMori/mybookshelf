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
        return view('admin.books.edit', ['book_form' => $book]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Book::$rules);
        
        $book = Book::find($request->id);
        $book_form = $request->all();
        if ($request->remove == 'true') {
            $book_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $book_form['image_path'] = basename($path);
        } else {
            $book_form['image_path'] = $book->image_path;
        }
        
        unset($book_form['image']);
        unset($book_form['remove']);
        unset($book_form['_token']);
        
        $book->fill($book_form)->save();
        
        return redirect('admin/books/edit');

    }
}
