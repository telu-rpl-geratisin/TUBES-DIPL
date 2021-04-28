<?php

namespace App\Controllers;

use App\Models\Publik;
use CodeIgniter\Controller;

class User extends Controller {
	public function get() {
		$model = new PublikModel();

		if ($this->request->getMethod() === 'post') {

			// mengecek apakah value username disisipkan
			if (isset($this->request->getPost('username'))) {
				// disisipkan
				$post_data = [
					'username' => $this->request->getPost('username')
				];
			} else {
				// tidak disisipkan
				echo "username field not included";
				exit();
			}

			$res = $model->getPublikByUsername($username);

			return $res;
		}
	}
}