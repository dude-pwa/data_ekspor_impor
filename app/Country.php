<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
    	'destctry', 'ctrydescen'
    ];

    public function exports(){
    	return $this->hasMany('App\Export');
    }

    public function imports(){
    	return $this->hasMany('App\Import');
    }
}
