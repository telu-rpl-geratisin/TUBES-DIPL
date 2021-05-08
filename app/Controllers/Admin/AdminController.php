<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\PenggunaAdminModel;

class AdminController extends BaseController {
	public function index() {
		
	}

	public function login() {
		helper (['form']);

		return view('admin/login');
	}

	public function dashboard() {
		$is_auth = $this->session->get('auth_login');
		
		if($is_auth) {
			$data['title'] = 'Dashboard';
			$data['user_fullname'] = $this->session->get('user_fullname');
			//echo 'Selamat datang '.$this->session->get('name');
			return view('admin/dashboard', $data);
		
		} else {
			echo '<script>alert("Anda tidak terautentikasi, silahkan login terlebih dahulu")</script>';
		}
	}

	public function verify() {
		helper (['form']);

		if ($this->request->getMethod() === 'post') {
			
			if ( !$this->validate('adminLogin') ) {
				$data['errors'] = $this->validator->getErrors();
				return view('admin/login', $data);
			}

			$post_data = [
				'username' => $this->request->getPost('username'),
				'user_password' => $this->request->getPost('user_password')
			];

			$model = new PenggunaAdminModel();			
			$user = $model->getByUsername($post_data['username']);
			
			if( is_null($user) ) {
				$this->session->setFlashdata('login_msg', 'Username atau password salah');
				return redirect()->to('/admin/login')->withInput();
			}

			if( $user['user_password'] != $post_data['user_password'] ) {
				$this->session->setFlashdata('login_msg', 'Username atau password salah');
				return redirect()->to('/admin/login')->withInput();		
			}

			$this->session->set('username', $user['username']);
			$this->session->set('user_fullname', $user['nama_depan'].' '.$user['nama_belakang']);
			$this->session->set('auth_login', true);

			return redirect()->to('/admin/dashboard');
		}
	}

	public function logout() {
		$this->session->destroy();

		return redirect()->to('/admin/login');
	}
}