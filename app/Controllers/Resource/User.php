<?php

namespace App\Controllers\Resource;

use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $modelName = 'App\Models\User';
    protected $format    = 'json';

    public function getPublic()
    {
        return $this->respond($this->model->where('type', 'public')->findAll());
    }

    public function getCompany()
    {
        return $this->respond($this->model->where('type', 'company')->findAll());
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