<?php

namespace App\Controllers\All;

use App\Controllers\BaseController;
use Config\Database;

class ScholarshipController extends BaseController
{
	public function insertRating()
	{
		$data['rating'] = $this->request->getPost('rating');
		$data['scholarship_id'] = $this->request->getPost('scholarship_id');
		$data['user_id'] = $this->request->getPost('user_id');

		if($this->validation->run($data, 'rating')) {
			// valid
			// connect to db
			$db = Database::connect();
			$res = $db->table('scholarship_rating')
				->insert($data);

			if(boolval($res)){
				$this->session->setFlashdata('msg', 'Input rating sukses.');	
			}else{
				$this->session->setFlashdata('error_msg', 'terjadi kesalahan saat menyimpan data');
			}
		}else{
			// not valid
			$this->session->setFlashdata('error_msg', $this->validation->getErrors()['rating']);
		}

		return redirect()->back();
	}

	public function deleteComment($id)
	{
		$db = Database::connect();
		$res = $db->table('scholarship_comment')
			->where('id', $id)
			->delete();

		$this->session->setFlashdata('msg', 'Komentar berhasil dihapus.');
		return redirect()->back();
	}
}
