<?php

namespace App\Controllers\Public;

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
		$author = User::ins()->find($scholarship['user_id'])['name'];
		$author_verif = User::ins()->find($scholarship['user_id'])['status'];
		$rating = $db->table('scholarship_rating')
			->where('scholarship_id', $scholarship['id'])
			->get()
			->getFirstRow('array')['rating'];

		$comments = $db->table('scholarship_comment')
			->join('user', 'user.id = scholarship_comment.user_id', 'left')
			->select('scholarship_comment.*')
			->select('user.name as author, user.photo as author_photo')
			->get()
			->getResultArray();
		// dd($comments);
		
		return view('public/scholarship_show', [
			'title' => 'Detail Beasiswa',
			'page_id' => 'scholarship',
			'scholarship' => $scholarship,
			'author' => $author,
			'author_verif' => $author_verif,
			'rating' => $rating,
			'comments' => $comments
		]);
	}

	public function showMyScholarship()
	{
		$user_id = User::ins()->where('username', $this->session->get('username'))->first()['id'];
		$scholarships = Scholarship::ins()->where('user_id', $user_id)->findAll();

		dd($scholarships);
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

		// dd($scholarship->errors());

		if(boolval($res)) {
			$this->session->setFlashdata('msg', 'Anda telah sukses menambahkan beasiswa.');
		}else{
			$this->session->setFlashdata('data_error', $scholarship->errors());
        	return redirect()->back()->withInput();
		}

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
}