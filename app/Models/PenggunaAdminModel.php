<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaAdminModel extends Model
{
  protected $table = 'pengguna_admin';
  protected $primaryKey = 'id_admin';

  protected $allowedFields = ['username', 'user_password', 'nama_depan', 'nama_belakang', 'email', 'no_hp', 'alamat'];

  // public function getAll() {
  // 	$users = $this->findAll();
  // 	return $users;
  // }

  public function getByUsername($username) {
  	$user =  $this->where(['username' => $username])
  								->first();
  	// dd($user);
  	return $user;
  }
}