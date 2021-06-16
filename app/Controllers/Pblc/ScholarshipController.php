<?php

namespace App\Controllers\Pblc;

use App\Controllers\BaseController;
use App\Models\Scholarship;
use App\Models\User;
use Config\Database;

class ScholarshipController extends BaseController
{
	public function index()
	{
		// connect to db
		$db = Database::connect();

		$scholarships = $db->table('scholarship')
			->join('user', 'user.id = scholarship.user_id', 'left')
			->select('scholarship.*')
			->select('user.type')
			->where('scholarship.status', 'verified')
			->get()
			->getResultArray();

		// dd($scholarships);
		return view('public/scholarship',[
			'scholarships' => $scholarships,
			'title' => 'Daftar Beasiswa',
			'page_id' => 'scholarship'
		]);
	}

	public function show($id)
	{
		// connect to db
		$db = Database::connect();

		$scholarship = Scholarship::ins()->find($id);
		$user = User::ins()->find($scholarship['user_id']);

		$author = $user['name'];
		$author_verif = $user['status'];
		$author_photo = $user['photo'];
		$rating = $db->table('scholarship_rating')
			->where('scholarship_id', $scholarship['id'])
			->get()
			->getFirstRow('array')['rating'];

		$comments = $db->table('scholarship_comment')
			->join('user', 'user.id = scholarship_comment.user_id', 'left')
			->select('scholarship_comment.*')
			->select('user.name as author, user.photo as author_photo')
			->where('scholarship_comment.scholarship_id', $id)
			->get()
			->getResultArray();
		// dd($comments);
		
		return view('public/scholarship_show', [
			'title' => 'Detail Beasiswa',
			'page_id' => 'scholarship',
			'scholarship' => $scholarship,
			'author' => $author,
			'author_verif' => $author_verif,
			'author_photo' => $author_photo,
			'rating' => $rating,
			'comments' => $comments
		]);
	}

	public function showMyScholarship()
	{
		$user_id = User::ins()->where('username', $this->session->get('username'))->first()['id'];
		$scholarships = Scholarship::ins()->where('user_id', $user_id)->findAll();

		// dd($scholarships);

		return view('public/my_scholarship',[
			'title' => 'Beasiswa Saya',
			'page_id' => 'my_scholarship',
			'scholarships' => $scholarships
		]);
	}

	public function showCreateScholarship()
	{
		return view('public/create_scholarship', [
			'title' => 'Tambah Beasiswa',
			'page_id' => 'create_scholarship'
		]);
	}

	public function create()
	{
		$data['user_id'] = User::ins()->where('username', $this->session->get('username'))->first()['id'];

		$data['name'] = $this->request->getPost('name');
		$data['description'] = $this->request->getPost('description');
		$data['end_date'] = $this->request->getPost('end_date');
		$data['link'] = $this->request->getPost('link');

		$photo = $this->request->getFile('brochure');

		if($photo->getFileName() != '') {
			$name = str_replace(" ", "_", $data['name']);
			$name = strtolower($name);
			$new_name = $name.'_'.random_string('numeric', 16).'.'.$photo->getExtension();
			$data['photo'] = $new_name;
			$photo->move(ROOTPATH.'public/storage/images', $new_name);
		}

		// dd($data);

		$scholarship = new Scholarship();
		$res = $scholarship->insert($data);

		// dd($res);

		if(boolval($res)) {
			$this->session->setFlashdata('msg', 'Anda telah sukses menambahkan beasiswa.');
		}else{
			$this->session->setFlashdata('data_error', $scholarship->errors());
        	return redirect()->back()->withInput();
		}

		// connect to db
		$db = Database::connect();

		$res_rating = $db->table('scholarship_rating')
			->insert([
				'scholarship_id' => $res,
				'rating' => 0
			]);

		return redirect('public.create_scholarship');
	}

	public function createComment($id)
	{
		$username = $this->request->getPost('author_username');
		$data['scholarship_id'] = $id;
		$data['comment'] = $this->request->getPost('comment_text');

		// dd([$username, $comment]);

		// connect to db
		$db = Database::connect();
		$data['user_id'] = $db->table('user')->where('username', $username)->get()->getFirstRow()->id;
		
		$res = $db->table('scholarship_comment')->insert($data)->getResultArray();
		$this->session->setFlashdata('msg', 'Komentar berhasil diposting');
		return redirect()->back();
	}

	public function edit($id)
	{
		$scholarship = Scholarship::ins()->find($id);

		// dd($scholarship);

		return view('public/edit_scholarship',[
			'title' => 'Edit Beasiswa',
			'page_id' => 'edit_scholarship',
			'scholarship' => $scholarship
		]);
	}

	public function update($id)
	{
		$data['name'] = $this->request->getPost('name');
		$data['description'] = $this->request->getPost('description');
		$data['end_date'] = $this->request->getPost('end_date');
		$data['link'] = $this->request->getPost('link');

		$photo = $this->request->getFile('brochure');

		if($photo->getFileName() != '') {
			$name = str_replace(" ", "_", $data['name']);
			$name = strtolower($name);
			$new_name = $name.'_'.random_string('numeric', 16).'.'.$photo->getExtension();
			$data['photo'] = $new_name;
			$photo->move(ROOTPATH.'public/storage/images', $new_name);
		}

		$scholarship = new Scholarship();
		$res = $scholarship->update($id, $data);

		// dd($res);

		if(boolval($res)) {
			$this->session->setFlashdata('msg', 'Anda telah sukses mengedit data beasiswa.');
		}else{
			$this->session->setFlashdata('data_error', $scholarship->errors());
        	return redirect()->back()->withInput();
		}

		return redirect()->back();
	}

	public function showVerify($id)
	{
		$scholarship = Scholarship::ins()->find($id);
		// dd($scholarship);

		return view('public/verify_scholarship', [
			'title' => 'Verifikasi Beasiswa',
			'page_id' => 'verify_scholarship',
			'scholarship' => $scholarship
		]);
	}

	public function verify($id)
	{
		$scholarship = Scholarship::ins()->find($id);
		$document = $this->request->getFile('document');

		if($document->getFileName() != '') {
			$name = str_replace(" ", "_", $scholarship['name']);
			$name = strtolower($name);
			$new_name = $name.'_verification_'.random_string('numeric', 16).'.'.$document->getExtension();
			$data['document'] = $new_name;
			$document->move(ROOTPATH.'/storage/document', $new_name);
		}

		// dd($data);

		// connect to db
		$db = Database::connect();

		$res = $db->table('scholarship_verification_doc')
			->insert([
				'scholarship_id' => $id,
				'document' => $data['document']
			]);

		// dd($res->resultID);

		if($res->resultID) {
			$this->session->setFlashdata('msg', 'Anda telah sukses mengajukan verifikasi beasiswa.');
		}else{
			$this->session->setFlashdata('data_error', $scholarship->errors());
        	return redirect()->back()->withInput();
		}

		return redirect()->back();
	}

	public function showVerificationHelp()
	{
		return view('public/scholarship_verification_help',[
			'title' => 'Informasi Verifikasi Beasiswa',
			'page_id' => 'verify_scholarship',
		]);
	}
}