<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'Perusahaan',
			'perusahaan' => 'perusahaan\v_perusahaan'
		);
		return view('layout_perusahaan/v_wraper',$data);
	}
}
