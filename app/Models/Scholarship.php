<?php

namespace App\Models;

use CodeIgniter\Model;

class Scholarship extends Model
{
	private static $instance = null;
	
	protected $DBGroup              = 'default';
	protected $table                = 'scholarship';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['user_id', 'name', 'description', 'end_date', 'link', 'status'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public static function ins()
    {
        if (self::$instance == null)
        {
            self::$instance = new Scholarship();
        }

        return self::$instance;
    }

    public function noticeTable()
    {
        $builder = $this->db->table($this->table)
        	->join('user', 'user.id = scholarship.user_id', 'left')
            ->join('scholarship_rating', 'scholarship_rating.scholarship_id = scholarship.id', 'left')
            ->select('scholarship.*')
            ->select('user.name as user_name')
            ->select('scholarship_rating.rating');

        return $builder;
    }

}
