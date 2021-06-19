<?php

namespace App\Controllers\Pblc;

use App\Controllers\BaseController;
use App\Models\User;

class ProfileController extends BaseController
{
	public function index()
	{
		$username = $this->session->get('username');
		$user = User::ins()->where('username', $username)->get()->getResultArray()[0];

		return view('public/profile', [
			'user_data' => $user,
			'title' => 'Profil',
        	'page_id' => 'profile'
		]);
	}

	public function showEditProfile()
	{
		$username = $this->session->get('username');
		$user = User::ins()->where('username', $username)->get()->getResultArray()[0];

		return view('public/edit_profile', [
			'user_data' => $user,
			'title' => 'Edit Profil',
        	'page_id' => 'profile'
		]);
	}

	public function editProfile($id)
	{	
		helper('text');

		$data['name'] = $this->request->getPost('name');
		$data['contact'] = $this->request->getPost('contact');
		$data['address'] = $this->request->getPost('address');
		$data['postal_code'] = $this->request->getPost('postal_code');

		$photo = $this->request->getFile('photo');

		// dd($photo->getFileName());

		if($photo->getFileName() != '') {
			$name = str_replace(" ", "_", $data['name']);
			$name = strtolower($name);
			$new_name = $name.'_'.random_string('numeric', 16).'.'.$photo->getExtension();
			$data['photo'] = $new_name;
			$photo->move(ROOTPATH.'public/storage/images', $new_name);
		}

		$user = new User();
		$res = $user->update($id, $data);

		// dd($user->errors());

		if(boolval($res)) {
			$this->session->set('name', $data['name']);
			$this->session->setFlashdata('msg', 'Anda telah sukses mengedit profile');
		}else{
			$this->session->setFlashdata('data_error', $user->errors());
        	return redirect()->back()->withInput();
		}

		return redirect('public.profile');
	}
}
