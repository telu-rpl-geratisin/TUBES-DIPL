<?php

namespace App\Controllers\Resource;

use CodeIgniter\RESTful\ResourceController;

class CompanyUser extends ResourceController
{
    protected $modelName = 'App\Models\Companyuser';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
    	return $this->respond($this->model->find($id));
    }

    public function delete($id = null)
    {
    	return $this->respond($this->model->delete($id));
    }
}