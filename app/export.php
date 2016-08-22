<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class export extends Model
{
    protected $fillable = [
    	'country_id', 'harbor_id', 'item_id', 'date', 'netwt', 'value'
    ];

    public function country(){
    	return $this->belongsTo('App\Country');
    }

    public function harbor(){
    	return $this->belongsTo('App\Harbor');
    }

    public function item(){
    	return $this->belongsTo('App\Item');
    }
}
