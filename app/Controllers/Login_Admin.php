<?php

namespace App\Controllers;
use App\Models\Model_Login_Admin;

class Login_Admin extends BaseController
{
	
    public function __construct()
	{
		helper('form');
        $this->Model_Login_Admin= new Model_Login_Admin(); 
	}
    public function index()
	{
        
		$data = array(
			'title' => 'Login Admin ',
		);
		return view('admin\v_login_admin',$data);
	}

    public function login()
	{
        if($this->validate([
            'username' => [
                'label' => 'Username', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} wajib isi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password', 
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib isi !!!'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Login_Admin->login($username,$password);
            if ($cek){
                //jika data cocok 
                session()->set('log', true);
                session()->set('id_admin',$cek['id_admin']);
                session()->set('username',$cek['username']);
                session()->set('password',$cek['password']);
                return redirect()->to(base_url('Dashboard'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal,Username atau Password anda salah');
                return redirect()->to(base_url('Login_Admin/index'));
            }
        }else{
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login_Admin/index'));
        }
	}

    public function logout(){
        session()->remove('log');
        session()->remove('id_admin');
        session()->remove('username');

        session()->setFlashdata('pesan', 'anda telah logout');
        return redirect()->to(base_url('/Login_Admin/index'));
    }

  
}