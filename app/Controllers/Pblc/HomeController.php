<?php

namespace App\Controllers\Pblc;

use App\Controllers\BaseController;
use Config\Database;

class HomeController extends BaseController
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
			->orderBy('scholarship.id', 'RANDOM')
			->limit(6)
			->get()
			->getResultArray();

        return view('public/home', [
        	'title' => 'Home',
        	'page_id' => 'home',
        	'scholarships' => $scholarships
        ]);
	}
}
