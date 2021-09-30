<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tag;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        Book::find($request->id)->delete();
        Tag::where('book_id', $request->id)->delete();
        
        return redirect('admin/home');
    }
}
