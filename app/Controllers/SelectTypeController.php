<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SelectTypeController extends BaseController
{
	public function index()
	{
		return view('select_type');
	}
}
