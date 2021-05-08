<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\PenggunaPublikModel;

class PPublikController extends BaseController {
	public function index() {
		$model = new PenggunaPublikModel();
		$data['users'] = $model->getAll();
		$data['title'] = 'Pengguna Publik';
		return view('admin/pengguna_publik', $data);
	}
}