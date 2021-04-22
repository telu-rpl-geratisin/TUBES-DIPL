<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $table = 'publik';

  public function getPublik()
	{
    return $this->findAll();
	}
}