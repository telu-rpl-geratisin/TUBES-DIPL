<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Login extends Controller {
	public function index() {
		$data['title'] = 'Login';

		return view('login/index', $data);
	}
}