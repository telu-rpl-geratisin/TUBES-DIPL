<?php

namespace App\Controllers;
use App\Models\Model_Login;

class Login extends BaseController
{
	
    public function __construct()
	{
		helper('form');
        $this->Model_Login= new Model_Login(); 
	}
    public function index()
	{
        
		$data = array(
			'title' => 'Login',
		);
		return view('pengguna\v_login',$data);
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
            $cek = $this->Model_Login->login($username,$password);
            if ($cek){
                //jika data cocok 
                session()->set('auth', true);
                session()->set('username',$cek['username']);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal,Username atau Password anda salah');
                return redirect()->to(base_url('Login/index'));
            }
        }else{
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login/index'));
        }
	}

    public function logout(){
        session()->destroy();

        return redirect()->to(base_url('/Login/index'));
    }

    public function Daftar(){
        $data = array(
			'title' => 'Daftar Pengguna',
			'isi' => 'pengguna\v_daftar_pengguna'
		);
		return view('layout_polos/v_wraper',$data);
    }

  
}