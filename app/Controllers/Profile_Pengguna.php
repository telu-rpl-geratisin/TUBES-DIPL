<?php

namespace App\Controllers;

class Profile_Pengguna extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Profile Pengguna',
			'isi' => 'pengguna\v_profile'
		);
		return view('layout/v_wraper',$data);
	}

	public function coba2()
	{
		echo 'hahahhahaha';
	}
}