<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\Publicuser;
use Config\Validation;

class LoginController extends BaseController
{
    public function index()
	{
		helper('form');

		$data = array(
			'title' => 'Login',
		);
		return view('pengguna\v_login',$data);
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

        $user = Publicuser::ins()->where('username', $data['username'])->first();

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

        $this->session->set('auth', true);
        $this->session->set('username', $user['username']);

        return redirect('public.home.index');
	}

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('public.login.index');
    }
}
