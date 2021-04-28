<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use CodeIgniter\Controller;

class Login extends Controller {
	public function index() {
		$data['title'] = 'Login';

		return view('login/index', $data);
	}

	public function verify() {
		$model = new PenggunaModel();

		if ($this->request->getMethod() === 'post') {
			$post_data = [
				'username' => $this->request->getPost('username'),
				'password' => $this->request->getPost('password')
			];

			$res = $model->verifyLogin($post_data);
			
			if( boolval($res) ) {
				// redirect to admin
				return redirect()->to('/admin');
			}	
		}
	}
}