<?php

namespace App\Controllers\Pblc;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function index()
	{
		return view('public/login', [
            'title' => 'Login'
        ]);
	}

    public function login()
	{
		$data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');

		$valid = $this->validation->run($data, 'login');

        if(!$valid)
        {
        	$this->session->setFlashdata('val_errors', $this->validation->getErrors());	
			return redirect()->back()->withInput();
        }

        $user = User::ins()
            ->where('type', 'public')
            ->where('username', $data['username'])
            ->first();

        if(is_null($user))
        {
        	$this->session->setFlashdata('data_error', 'Username salah');
        	return redirect()->back()->withInput();
        }

        if($user['password'] !== $data['password'])
        {
        	$this->session->setFlashdata('data_error', 'Password salah');
        	return redirect()->back()->withInput();
        }

        $this->session->set('auth_pub', true);
        $this->session->set('username', $user['username']);
        $this->session->set('user_id', $user['id']);
        $this->session->set('name', $user['name']);
        $this->session->set('photo', $user['photo']);
        
        return redirect('public.home');
	}

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('public.login.index');
    }
}
