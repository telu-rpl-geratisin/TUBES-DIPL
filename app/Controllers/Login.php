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
                session()->set('nama_depan',$cek['nama_depan']);
                session()->set('nama_belakang',$cek['nama_belakang']);
                session()->set('jenis_kelamin',$cek['jenis_kelamin']);
                session()->set('no_hp',$cek['no_hp']);
                session()->set('password',$cek['password']);
                session()->set('email',$cek['email']);
                session()->set('alamat',$cek['alamat']);
                session()->set('tanggal_lahir',$cek['tanggal_lahir']);
                session()->set('created_at',$cek['created_at']);
                return redirect()->to(base_url('pengguna'));
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

<<<<<<< HEAD
        return redirect()->to(base_url('/Login/index'));
=======
        session()->setFlashdata('pesan', 'anda telah logout');
        return redirect()->to(base_url('Login_Pengguna'));
>>>>>>> yahya
    }


  
}