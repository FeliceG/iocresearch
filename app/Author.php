<?php

namespace ioc;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //

	public function user() {
			return $this->belongsTo('\ioc\User');
		}

	public function research() {
	   return $this->belongsTo('\ioc\Research');
	}
}
