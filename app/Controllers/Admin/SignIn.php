<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SignIn extends BaseController
{
	public function index()
	{
		return view('admin/login');
	}

	public function signIn()
	{
		return 'signing in..';
	}
}
