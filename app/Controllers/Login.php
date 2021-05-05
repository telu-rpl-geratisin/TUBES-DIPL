<?php

namespace App\Controllers;

use App\Models\PenggunaAdminModel;
// use App\Models\PenggunaPublikModel;
// use App\Models\PenggunaPerusahaanModel;
use CodeIgniter\Controller;

class Login extends BaseController {
	public function index() {
		$data['title'] = 'Login';

		return view('login/index', $data);
	}

	public function verify() {
		if ($this->request->getMethod() === 'post') {
			$post_data = [
				'tipe_pengguna' => $this->request->getPost('tipe_pengguna'),
				'username' => $this->request->getPost('username'),
				'user_password' => $this->request->getPost('password')
			];

			switch ($post_data['tipe_pengguna']) {
				case 'admin':
					$model = new PenggunaAdminModel();
					break;
				// case 'perusahaan':
				// 	$model = new PenggunaPerusahaanModel();
				// 	break;
				// case 'publik':
				// 	$model = new PenggunaPublikModel();
				// 	break;
				default:
					echo "failed login: tipe_pengguna not match";
					// var_dump($post_data);
					exit();
			}
			
			$user = $model->getByUsername($post_data['username']);
			
			if( $user['user_password'] == $post_data['user_password'] ) {
				$this->session->set('username', $user['username']);
				$this->session->set('user_fullname', $user['nama_depan'].' '.$user['nama_belakang']);
				$this->session->set('auth_login', true);

				// echo "success login, ".$this->session->get('username');
				return redirect()->to('/admin/dashboard');
			}	else {
				echo "failed login";
			}
		}
	}

	public function logout() {
		$this->session->destroy();

		return redirect()->to('/login');
	}
}