<?php

namespace App\Controllers;

use App\Models\PenggunaPublikModel;
use CodeIgniter\Controller;

class Test extends BaseController {
	public function index() {
		$penggunaPublik = new PenggunaPublikModel();
		$data['penggunas'] = $penggunaPublik->getAll();

		var_dump($data['penggunas']);
		var_dump($this->session);
	}
}