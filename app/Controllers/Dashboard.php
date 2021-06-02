<?php

namespace App\Controllers;

class Dashboard	extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'admin' => 'admin/v_admin'
		);
		return view('layout_admin/v_wraper',$data);
	}

	public function coba2()
	{
		echo 'hahahhahaha';
	}
}