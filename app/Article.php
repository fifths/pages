<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    public function picture()
    {
        return $this->hasOne('App\Picture', 'id', 'picture_id');
    }
}
