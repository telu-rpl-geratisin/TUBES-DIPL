<?php

namespace App\Controllers;

use App\Models\PublikModel;
use CodeIgniter\Controller;

class Admin extends BaseController {
	public function index() {
		$model = new PublikModel();
    $res = $model->getPublik();

    if( boolval($res) ) {
    	$data['publik'] = $res;
    }
    
		$data['title'] = 'Dashboard';
		
		return view('admin/home', $data);
	}

	public function manage_pengguna_publik() {
		
		$model = new PublikModel();
    $data['publik'] = $model->getPublik();
		$data['title'] = 'Dashboard';

		return view('admin/manage_pengguna_publik', $data);
	}

	public function dashboard() {
		$is_auth = $this->session->get('auth_login');
		
		if($is_auth) {
			$data['title'] = 'Dashboard';
			$data['user_fullname'] = $this->session->get('user_fullname');
			//echo 'Selamat datang '.$this->session->get('name');
			return view('admin/dashboard', $data);
		
		} else {
			echo '<script>alert("Anda tidak terautentikasi, silahkan login terlebih dahulu")</script>';
		}
	}
}