<?php

namespace App\Controllers;

use App\Models\PenggunaPublikModel;
use CodeIgniter\Controller;

class Test extends BaseController {
	public function index() {
		return view('admin/login');
	}
}