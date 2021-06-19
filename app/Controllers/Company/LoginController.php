<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function index()
    {
        return view('company/login', [
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
            ->where('type', 'company')
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

        $this->session->set('auth_company', true);
        $this->session->set('username', $user['username']);
        $this->session->set('user_id', $user['id']);
        $this->session->set('name', $user['name']);
        $this->session->set('photo', $user['photo']);
        
        // dd('success');

        return redirect('company.home');
    }

    public function logout()
    {
        $this->session->destroy();
        
        return redirect('company.login.index');
    }
}
