<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'content' => 'admin/v_dashboard'
		);
		
		return view('layout_admin/v_wrapper',$data);
	}
}
