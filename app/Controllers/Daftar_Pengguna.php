<?php

namespace App\Controllers;

class Daftar_Pengguna extends BaseController
{
    public function index(){
        $data = array(
			'title' => 'Daftar Pengguna',
			'isi' => 'pengguna\v_daftar_pengguna'
		);
		return view('layout/v_wraper',$data);
    }
}