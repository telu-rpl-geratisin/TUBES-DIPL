<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaPublikModel extends Model
{
  protected $table = 'pengguna_publik';
  protected $primaryKey = 'id_publik';

  protected $allowedFields = ['username', 'user_password', 'nama_depan', 'nama_belakang', 'email', 'tanggal_lahir', 'jenis_kelamin', 'no_hp', 'alamat'];

  public function getAll() {
  	$users = $this->findAll();
  	return $users;
  }
}