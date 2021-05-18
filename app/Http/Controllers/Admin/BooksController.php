<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    //追加
    public function add()
    {
        return view('admin.books.create');
    }
}
