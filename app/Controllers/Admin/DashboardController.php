<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'admin' => 'admin/v_admin'
		);
		
		return view('layout_admin/v_wraper',$data);
	}
}
