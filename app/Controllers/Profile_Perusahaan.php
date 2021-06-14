<?php

namespace App\Controllers;

class Profile_Perusahaan extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Profile Perusahaan',
			'perusahaan' => 'perusahaan\v_profile_perusahaan'
		);
		return view('layout_perusahaan/v_wraper',$data);
	}

}