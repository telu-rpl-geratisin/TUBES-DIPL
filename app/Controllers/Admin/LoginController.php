<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class LoginController extends BaseController
{
	public function showLogin()
	{
		return view('admin/login');
	}

	public function login()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$user = UserModel::ins()->where('username', $username)
			->first();

		if( !$user ) {
			$this->session->setFlashdata('error', 'Username tidak terdaftar!');
			return redirect()->back()->withInput();
		}

		if( $password !== $user['password'])
		{
			$this->session->setFlashdata('error', 'Password salah!');
			return redirect()->back()->withInput();
		}

		// set session data
		$this->session->set('username', $user['username']);
		$this->session->set('user_fullname', $user['first_name'].' '.$user['last_name']);
		$this->session->set('auth_login', true);

		return 'sucessfully sign in';

	}
}
