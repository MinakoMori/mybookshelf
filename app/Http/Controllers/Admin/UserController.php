<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //追加
    public function add()
    {
        return view('admin.bookshelf.create');
    }
}
