<?php

namespace App\Controllers;

class Perusahaan extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Perusahaan',
			'perusahaan' => 'perusahaan\v_perusahaan'
		);
		return view('layout_perusahaan/v_wraper',$data);
	}

	public function coba2()
	{
		echo 'hahahhahaha';
	}
}