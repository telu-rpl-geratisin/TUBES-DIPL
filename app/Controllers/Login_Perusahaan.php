<?php

namespace App\Controllers;
use App\Models\Model_Login_Perusahaan;

class Login_Perusahaan extends BaseController
{
	
    public function __construct()
	{
		helper('form');
        $this->Model_Login_Perusahaan= new Model_Login_Perusahaan(); 
	}
    public function index()
	{
        
		$data = array(
			'title' => 'Login Perusahaan ',
		);
		return view('perusahaan\v_login_perusahaan',$data);
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
            $cek = $this->Model_Login_Perusahaan->login($username,$password);
            if ($cek){
                //jika data cocok 
                session()->set('log', true);
                session()->set('id_perusahaan',$cek['id_perusahaan']);
                session()->set('username',$cek['username']);
                session()->set('password',$cek['password']);
                session()->set('nama_perusahaan',$cek['nama_perusahaan']);
                session()->set('deskripsi',$cek['deskripsi']);
                session()->set('kode_pos',$cek['kode_pos']);
                session()->set('contact_person',$cek['contact_person']);
                session()->set('rating',$cek['rating']);
                session()->set('alamat',$cek['alamat']);
                session()->set('created_at',$cek['created_at']);
                return redirect()->to(base_url('Perusahaan  '));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal,Username atau Password anda salah');
                return redirect()->to(base_url('Login_Perusahaan/index'));
            }
        }else{
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login_Peusahaan/index'));
        }
	}

    public function logout(){
        session()->remove('log');
        session()->remove('id_perusahaan');
        session()->remove('username');

        session()->setFlashdata('pesan', 'anda telah logout');
        return redirect()->to(base_url('Login_Pengguna'));
    }

  
}