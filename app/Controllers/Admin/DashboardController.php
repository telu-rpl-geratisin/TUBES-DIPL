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

		$scholarship_count = $db->table('scholarship')->countAll();
		$scholarship_unverified_count = $db->table('scholarship')
			->where('is_verified', 'N')
			->countAllResults();

		$public_count = $db->table('user')
			->where('type', 'public')
			->countAllResults();
		
		$company_count = $db->table('user')
			->where('type', 'company')
			->countAllResults();
		$company_unverified_count = $db->table('user')
			->where('type', 'company')
			->where('is_verified', 'N')
			->countAllResults();

		return view('admin/dashboard', [
			'title' => 'Dashboard',
			'scholarship_count' => $scholarship_count,
			'scholarship_unverified_count' => $scholarship_unverified_count,
			'public_count' => $public_count,
			'company_count' => $company_count,
			'company_unverified_count' => $company_unverified_count
		]);
	}
}
