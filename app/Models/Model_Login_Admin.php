<?php 

namespace app\Models;

use CodeIgniter\Model;

class Model_Login_Admin extends Model
{
    public function login($username,$password)
    {
        return $this->db->table('admin')->where([
             'username' => $username,
             'nama_depan' => $nama_depan,
             'nama_belakang' => $nama_belakang,
             'password' => $password
        ])->get()->getRowArray();
    }
}