<?php

namespace App\Controllers;

use App\Models\PublikModel;
use CodeIgniter\Controller;

class Admin extends Controller {
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
}