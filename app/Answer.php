<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //

	protected $primaryKey = 'id';

	
    protected $fillable = [
        'user_id', 'question_id', 'titel', 'text', 'date'
    ];
	
// public function user(){
//    	return $this->belongsTo('App\User');
//    }


}
