<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetaController extends Controller
{
    public function add()
    {
        return view('admin.books.deta');
    }
}
