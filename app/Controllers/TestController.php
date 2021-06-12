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
			->select('scholarship.*')
			->select('user.name as user_name')
			->get()
			->getResultArray();

		dd($query);
	}
}
