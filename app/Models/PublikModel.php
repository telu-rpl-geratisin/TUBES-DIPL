<?php

namespace App\Models;

use CodeIgniter\Model;

class PublikModel extends Model
{
  protected $table = 'publik';

  public function getPublik()
	{
		// query : SELECT * from `publik`
    return $this->findAll();
	}
}