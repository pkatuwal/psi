<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';	
    //

	public function companyTimeTable()
	{
		return $this->hasMany('App\Models\CompanyTimeTable');
	}

}


