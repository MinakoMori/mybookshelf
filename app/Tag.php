<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');
    
    public function books()
    {
        return $this->hasMany('App\Book');
    }
    
}
