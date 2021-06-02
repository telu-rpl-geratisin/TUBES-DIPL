<?php

namespace App\Models;

use CodeIgniter\Model;

class Adminuser extends Model
{
	private static $instance = null;
	
	protected $DBGroup              = 'default';
	protected $table                = 'admin_user';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $protectFields        = true;
	protected $allowedFields        = [];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public static function ins()
    {
        if (self::$instance == null)
        {
            self::$instance = new Adminuser();
        }

        return self::$instance;
    }
}
