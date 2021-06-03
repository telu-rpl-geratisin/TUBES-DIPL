<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Adminuser;

class LoginController extends BaseController
{
    public function index()
	{
		helper('form');

		$data = array(
			'title' => 'Login Admin',
		);

		return view('admin\v_login',$data);
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

        $user = Adminuser::ins()->where('username', $data['username'])->first();

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

        return redirect('admin.dashboard');
	}

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('admin.login.index');
    }
}
