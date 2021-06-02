<?php 

namespace app\Models;

use CodeIgniter\Model;

class Model_Login extends Model
{
    public function login($username,$password)
    {
        return $this->db->table('publik')->where([
             'username' => $username,
            //  'nama_depan' => $nama_depan,
            //  'nama_belakang' => $nama_belakang,
             'password' => $password
        ])->get()->getRowArray();
    }
}