<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class DashboardController extends BaseController
{
	public function index()
	{
		// connect to db
		$db = Database::connect();

		// $scholarship_count = $db->table('scholarship')->countAll();
		$public_count = $db->table('user')
			->where('type', 'public')
			->countAllResults();
		$company_count = $db->table('user')
			->where('type', 'company')
			->countAllResults();
		
		return view('admin/dashboard', [
			'title' => 'Dashboard',
			'public_count' => $public_count,
			'company_count' => $company_count
		]);
	}
}
