<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

	protected $table = 'family';

	public function father() {
		return $this->hasOne('App\Models\Militant', 'father_id');
	}

	public function mother() {
		return $this->hasOne('App\Models\Militant', 'mother_id');
	}
}

// End of file