<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Militant extends Model {
	
	protected $table = 'militants';

	public function born() {
		return $this->belongsTo('App\Models\Address', 'born_id');
	}

	public function address() {
		return $this->belongsTo('App\Models\Address', 'address_id');
	}

	public function father() {
		return $this->belongsTo('App\Models\Family', 'father_id');
	}

	public function mother() {
		return $this->belongsTo('App\Models\Family', 'mother_id');
	}

}

// End of file