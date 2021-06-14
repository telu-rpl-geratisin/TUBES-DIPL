<?php

namespace App\Controllers;

class Profile_Pengguna extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Profile Pengguna',
			'pengguna' => 'pengguna\v_profile'
		);
		return view('layout_pengguna/v_wraper',$data);
	}

	public function coba2()
	{
		echo 'hahahhahaha';
	}
}