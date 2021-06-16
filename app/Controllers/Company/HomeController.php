<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
        return view('company/home', [
        	'title' => 'Home Perusahaan',
        	'page_id' => 'home'
        ]);
	}
}
