<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'isi' => 'pengguna\v_home'
		);
		return view('layout/v_wraper',$data);
	}
}
