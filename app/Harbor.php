<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harbor extends Model
{
    protected $fillable = [
    	'pod', 'podname'
    ];

    public function exports(){
    	return $this->hasMany('App\Export');
    }
}
