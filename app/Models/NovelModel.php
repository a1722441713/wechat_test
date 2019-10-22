<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NovelModel extends Model
{
    protected $table = 'novels';

    protected $fillable = ['title','link'];
}
