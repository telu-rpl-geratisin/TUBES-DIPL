<?php

namespace App\Controllers\Pblc;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
        return view('public/home', [
        	'title' => 'Home',
        	'page_id' => 'home'
        ]);
	}
}
