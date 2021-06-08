<?php

namespace App\Models;

use CodeIgniter\Model;

class Companyuser extends Model
{
    private static $instance = null;

    protected $DBGroup              = 'default';
    protected $table                = 'company_user';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['username', 'email', 'password', 'company_name', 'address', 'postal_code', 'contact'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    // Validation
    protected $validationRules    = [];
    protected $validationMessages   = [];
    protected $skipValidation = false;

    public static function ins()
    {
        if (self::$instance == null)
        {
            self::$instance = new Companyuser();
        }

        return self::$instance;
    }

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);

        return $builder;
    }
}
