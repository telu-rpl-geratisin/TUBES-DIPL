<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddScholarships extends Seeder
{
	public function run()
	{
		$this->db->table('scholarship')->insert([
        	'user_id' => 3,
            'name' => 'Beasiswa Telkom Cerdas',
            'description'    => 'Beasiswa dari Telkom University',
            'end_date' => '2021-12-30',
            'link' => 'https://telkomuniversity.ac.id'
        ]);

        $this->db->table('scholarship_rating')->insert([
            'user_id' => 3,
            'scholarship_id' => 1,
            'rating' => 4
        ]);
	}
}
