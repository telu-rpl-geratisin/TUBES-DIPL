<?php

namespace App\Controllers;

class Beasiswa extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Beasiswa',
			'beasiswa' => 'beasiswa\v_beasiswa'
		);
		return view('layout_beasiswa/v_wraper',$data);
	}
}
