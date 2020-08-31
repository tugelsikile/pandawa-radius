<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table = 'privileges';
    public $incrementing = false;
    protected $hidden = ['created_at','updated_at'];
    public function menuObj(){
        return $this->belongsTo(Menus::class,'menu_id','id');
    }
}
