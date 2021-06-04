<?php

namespace App\Models;

use CodeIgniter\Model;

class Publicuser extends Model
{
    private static $instance = null;

    protected $DBGroup              = 'default';
    protected $table                = 'public_user';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['username', 'email', 'password', 'first_name', 'last_name', 'phone', 'address'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    // Validation
    protected $validationRules    = [
        'username'     => 'required|alpha_numeric|min_length[3]',
        'email'        => 'required|valid_email|is_unique[admin_user.email]',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required_with[password]|matches[password]',
        'first_name'   => 'required|alpha',
        'last_name'    => 'required|alpha',
        'phone' 	   => 'numeric'
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'field username harus diisi',
            'alpha_numeric' => 'username hanya boleh menggunakan huruf dan angka',
            'min_length' => 'panjang username minimal 3 karakter'
        ],
        'email' => [
            'required' => 'field email harus diisi',
            'valid_email' => 'format email tidak valid',
            'is_unique' => 'email ini sudah terdaftar'
        ],
        'password' => [
            'required' => 'field password harus diisi',
            'min_length' => 'panjang password minimal 8 karakter'
        ],
        'pass_confirm' => [
            'required_with' => 'field password harus diisi',
            'matches' => 'input harus sama dengan field password'
        ],
        'first_name' => [
            'required' => 'field nama depan harus diisi',
            'alpha' => 'hanya boleh menggunakan huruf'
        ],
        'last_name' => [
            'required' => 'field nama belakang harus diisi',
            'alpha' => 'hanya boleh menggunakan huruf'
        ],
        'phone' => [
            'numeric' => 'no hp hanya boleh menggunakan angka'
        ]
    ];
    protected $skipValidation = false;

    public static function ins()
    {
        if (self::$instance == null)
        {
            self::$instance = new Publicuser();
        }

        return self::$instance;
    }

    public function noticeFunction()
    {
        $builder = $this->db->table('public_user');

        return $builder;
    }

}
