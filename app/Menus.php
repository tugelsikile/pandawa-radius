<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    public $incrementing = false;
    protected $table = 'menus';
    protected $hidden = ['created_at','updated_at'];
}
