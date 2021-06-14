<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    private static $instance = null;

    protected $DBGroup              = 'default';
    protected $table                = 'user';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['type', 'username', 'email', 'password', 'name', 'photo', 'contact', 'address', 'postal_code', 'status'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    // Validation
    protected $validationRules    = [
        'username'     => 'required|alpha_numeric|min_length[3]',
        'email'        => 'required|valid_email|is_unique[user.email]',
        'password'     => 'required|min_length[8]',
        // 'pass_confirm' => 'required_with[password]|matches[password]',
        'name'   => 'required|alpha_space'
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
        // 'pass_confirm' => [
        //     'required_with' => 'field password harus diisi',
        //     'matches' => 'input harus sama dengan field password'
        // ],
        'name' => [
            'required' => 'field nama harus diisi',
            'alpha' => 'hanya boleh menggunakan huruf'
        ]
    ];
    protected $skipValidation = false;

    public static function ins()
    {
        if (self::$instance == null)
        {
            self::$instance = new User();
        }

        return self::$instance;
    }

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);

        return $builder;
    }
}
