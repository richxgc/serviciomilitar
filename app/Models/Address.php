<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
	protected $table = 'addresses';

	public function born() {
		return $this->hasOne('App\Models\Militant', 'born_id');
	}

	public function address() {
		return $this->hasOne('App\Models\Militant', 'address_id');
	}
}

// End of file