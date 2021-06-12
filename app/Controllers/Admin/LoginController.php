<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function index()
	{
		return view('admin\login', [
            'title' => 'Login Admin'
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
            ->where('type', 'admin')
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

        $this->session->set('auth_admin', true);
        $this->session->set('username', $user['username']);
        $this->session->set('name', $user['name']);

        return redirect('admin.dashboard');
	}

    public function verifyUserTest($username, $password)
    {
        $result = ['status' => 'success'];

        $data['username'] = $username;
        $data['password'] = $password;

        $valid = \Config\Services::validation()->run($data, 'login');

        if(!$valid)
        {
            $result = [
                'status' => 'failed',
                'message' => \Config\Services::validation()->getErrors()
            ];
            return $result;
        }

        $user = User::ins()
            ->where('type', 'admin')
            ->where('username', $data['username'])
            ->first();

        if(is_null($user))
        {
            $result = [
                'status' => 'failed',
                'message' => 'Username salah'
            ];

            return $result;
        }

        if($user['password'] !== $data['password'])
        {
            $result = [
                'status' => 'failed',
                'message' => 'Password salah'
            ];

            return $result;
        }

        return $result;
    }

    public function verifyUser($username, $password){
        return [
            'status' => 'failed', 
            'message' => 'login success'
        ];
    }

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('admin.login.index');
    }
}
