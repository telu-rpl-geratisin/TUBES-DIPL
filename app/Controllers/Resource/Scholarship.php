<?php

namespace App\Controllers\Resource;

use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Scholarship extends ResourceController
{
    protected $modelName = 'App\Models\Scholarship';
    protected $format    = 'json';

    public function getAll()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $db = Database::connect();
        $res = $db->table('scholarship')
            ->join('user', 'user.id = scholarship.user_id', 'left')
            ->join('scholarship_rating', 'scholarship_rating.scholarship_id = scholarship.id', 'left')
            ->select('scholarship.*')
            ->select('user.name as user_name')
            ->select('scholarship_rating.rating')
            ->get()
            ->getResultArray()[0];
        // dd($res);
    	return $this->respond($res);
    }

    public function delete($id = null)
    {
    	return $this->respond($this->model->delete($id));
    }
}