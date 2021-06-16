<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;
use App\Models\User;

class RegisterController extends BaseController
{
	public function index()
	{
		return view('company/register');
	}

	public function register()
	{
		helper('text');

		$data['type'] = 'company';
		$data['name'] = $this->request->getPost('name');

		$photo = $this->request->getFile('photo');
		$name = str_replace(" ", "_", $data['name']);
		$name = strtolower($name);
		$new_name = $name.'_'.random_string('numeric', 16).'.'.$photo->getExtension();
		$data['photo'] = $new_name;
		
		$data['contact'] = $this->request->getPost('contact');
		$data['address'] = $this->request->getPost('address');
		$data['postal_code'] = $this->request->getPost('postal_code');
		$data['email'] = $this->request->getPost('email');
		$data['username'] = $this->request->getPost('username');
		$data['password'] = $this->request->getPost('password');
		// $data['pass_confirm'] = $this->request->getPost('password');

		$user = new User();
		$res = $user->insert($data);

		// dd($res);

		if(boolval($res)) {
			$photo->move(ROOTPATH.'public/storage/images', $new_name);
			$this->session->setFlashdata('msg', 'Anda telah sukses mendaftar');
		}else{
			$this->session->setFlashdata('data_error', $user->errors());
        	return redirect()->back()->withInput();
		}

		return redirect('company.register');
	}
}
