<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $table = 'pengguna';
  protected $allowedFields = ['username', 'password'];
  
  public function verifyLogin($data)
	{
    return $this->asArray()
                ->where([
                	'username' => $data['username'], 
                	'password' => $data['password']
                ])
                ->first();
	}
}