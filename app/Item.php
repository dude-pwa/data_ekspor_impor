<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'hsxcode', 'desc', 'sitc8code'
    ];

    public function exports(){
    	return $this->hasMany('App\Export');
    }
}
