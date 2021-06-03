<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;
use App\Models\Companyuser;
use Config\Validation;

class LoginController extends BaseController
{
    public function index()
	{
		$data = array(
			'title' => 'Login Perusahaan ',
		);
		return view('perusahaan\v_login_perusahaan',$data);
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

        $user = Companyuser::ins()->where('username', $data['username'])->first();

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

        return redirect('company.home.index');
	}

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('company.login.index');
    }
}
