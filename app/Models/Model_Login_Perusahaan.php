<?php 

namespace app\Models;

use CodeIgniter\Model;

class Model_Login_Perusahaan extends Model
{
    public function login($username,$password)
    {
        return $this->db->table('company_user')->where([
             'username' => $username,
             'password' => $password
        ])->get()->getRowArray();
    }
}