<?php

namespace App\Controllers;

class Perusahaan extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Perusahaan',
			'perusahaan' => 'home\v_home_login'
		);
		return view('layout_perusahaan/v_wraper',$data);
	}

}