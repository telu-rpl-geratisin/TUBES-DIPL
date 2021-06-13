<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class TestController extends BaseController
{
	public function index()
	{
		$db = Database::connect();
		$query = $db->table('scholarship')
        	->join('user', 'user.id = scholarship.user_id', 'left')
            ->join('scholarship_rating', 'scholarship_rating.scholarship_id = scholarship.id', 'left')
            ->select('scholarship.*')
            ->select('user.name as user_name')
            ->select('scholarship_rating.rating')
            ->where('is_verified', 'N')
			->get()
			->getResultArray();

		dd($query);
	}

	public function createUserPage()
	{
		return view('test_create_user');
	}

	public function createUser()
	{
		$pp = $this->request->getFile('profile_picture');
		$pp_mimetype = $pp->getMimeType();
		$pp_bin = addslashes(file_get_contents($pp));

		$data['profile_picture'] = $pp_bin;
		$data['pp_mime_type'] = $pp_mimetype;
		$data['type'] = $this->request->getPost('type');
		$data['username'] = $this->request->getPost('username');
		$data['email'] = $this->request->getPost('email');
		$data['password'] = $this->request->getPost('password');
		$data['name'] = $this->request->getPost('name');

		//dd($data);

		$db = Database::connect();
		try {
			$db->table('user')
				->insert($data);
			echo 'success';
		}
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}

	public function viewUser()
	{
		// $db = Database::connect();
		// $user = $db->table('user')
		// 	->where('id', 4)
		// 	->get()
		// 	->getResultArray()[0];

		// dd($user);
		$text = ROOTPATH;
		$text = str_replace('\/', '/', $text);
		echo $text;
	}

	public function uploadPage()
	{
		return view('test_upload');
	}

	public function upload()
	{
		helper('text');

		$doc = $this->request->getFile('document');
		$name = str_replace(" ", "_", 'Telkom');
		$name = strtolower($name);
		$new_name = $name.'_verification_'.random_string('numeric', 16).'.pdf';

		$data['company_user_id'] = $this->request->getPost('company_user_id');
		$data['document'] = $new_name;

		$doc->move(ROOTPATH.'storage/document', $new_name);

		// dd($doc);

		$db = Database::connect();
		try {
			$db->table('company_verification_doc')
				->insert($data);
			echo 'success';
		}
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}

	public function view()
	{
		$db = Database::connect();
		$doc = $db->table('company_verification_doc')
			->get()
			->getResultArray()[0]['document'];

		// dd($this->response);
		return $this->response->download(ROOTPATH.'storage/document/'.$doc, null);
	}
}
