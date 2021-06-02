<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'isi' => 'pengguna\v_home'
		);
		return view('layout/v_wraper',$data);
	}

	public function coba2()
	{
		echo 'hahahhahaha';
	}
}
