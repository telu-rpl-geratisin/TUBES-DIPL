<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Publicuser;

class ApiController extends BaseController
{
	public function getAllUsers()
	{
		$users['data'] = Publicuser::ins()->findAll();
		
		return json_encode($users);
	}
}
