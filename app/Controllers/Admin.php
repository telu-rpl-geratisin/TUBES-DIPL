<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use CodeIgniter\Controller;

class Admin extends Controller {
	public function index() {
		$model = new PenggunaModel();
    $data['publik'] = $model->getPublik();
		$data['title'] = 'Dashboard';
		
		return view('admin/home', $data);
	}
}