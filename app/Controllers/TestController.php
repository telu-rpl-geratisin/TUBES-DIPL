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

	public function uploadPage()
	{
		return view('test_upload');
	}

	public function upload()
	{
		helper('text');

		$doc = $this->request->getFile('document');
		$name = str_replace(" ", "_", 'Beasiswa Telkom Cerdas');
		$name = strtolower($name);
		$new_name = $name.'_verification_'.random_string('numeric', 16).'.pdf';

		$data['scholarship_id'] = $this->request->getPost('scholarship_id');
		$data['document'] = $new_name;

		$doc->move(ROOTPATH.'storage/document', $new_name);

		// dd($doc);

		$db = Database::connect();
		try {
			$db->table('scholarship_verification_doc')
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
		$doc = $db->table('scholarship_verification_doc')
			->get()
			->getResultArray()[0]['document'];

		// dd($this->response);
		return $this->response->download(ROOTPATH.'storage/document/'.$doc, null);
	}
}
