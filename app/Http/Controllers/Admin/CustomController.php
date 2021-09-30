<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Storage;

class CustomController extends Controller
{
    public function index()
    {
        // Image Modelからデータを取得する
        $user = User::first();
        if (empty($user)) {
            abort(404);    
        }
        //dd($custom);
        return view('admin.books.custom', [
            'user' => $user
        ]);
    }
    
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $form = $request->all();
        
        if (isset($form['header_image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['header_image'],'public');
            $user['header_image_path'] = Storage::disk('s3')->url($path);
        } elseif ($request->head_remove == 'true') {
            $user['header_image_path'] = null;
        } elseif ($request->head_remove == 'false') {
            $user['header_image_path'] = $user->header_image_path;
        } else {
            $user['header_image_path'] = $user->header_image_path;
        }
        
        if (isset($form['icon_image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['icon_image'],'public');
            $user['icon_image_path'] = Storage::disk('s3')->url($path);
        } elseif ($request->icon_remove == 'true') {
            $user['icon_image_path'] = null;
        } elseif ($request->icon_remove == 'false') {
            $user['header_image_path'] = $user->header_image_path;
        } else {
            $user['icon_image_path'] = $user->icon_image_path;
        }
        
        //dd($custom);

        $user->save();

        // Image Modelからデータを取得する
        $user = User::first();
        if (empty($user)) {
            abort(404);    
        }
        
        //return view('admin.books.custom', ['user' => $user]);
        return redirect('admin/home');
    }
}
