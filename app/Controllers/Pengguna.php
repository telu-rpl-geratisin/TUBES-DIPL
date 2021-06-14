<?php

namespace App\Controllers;

class Pengguna  extends BaseController
{
	public function index()
		{
            $data = array(
                'title' => 'Home',
                'pengguna' => 'home\v_home_login'
            );
            return view('layout_pengguna/v_wraper',$data);
        }

}
