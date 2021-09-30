<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'author' => 'required',
        'money' => 'required',
    );
    
    public function tags()
    {
        return $this->hasMany('App\Tag');

    }
}
