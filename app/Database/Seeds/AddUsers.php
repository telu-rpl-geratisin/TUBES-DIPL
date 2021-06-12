<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddUsers extends Seeder
{
	public function run()
    {
        $this->db->table('user')->insert([
        	'type' => 'admin',
            'username' => 'admin',
            'email'    => 'admin@email.com',
            'password' => 'password',
            'name' => 'Admin',
            'contact' => 123456789,
            'address' => 'jl. abc',
            'postal_code' => 12345
        ]);

        $this->db->table('user')->insert([
        	'type' => 'public',
            'username' => 'andi',
            'email'    => 'andi@email.com',
            'password' => 'password',
            'name' => 'Andi Kurnia',
            'contact' => 123456789,
            'address' => 'jl. abc',
            'postal_code' => 12345
        ]);

        $this->db->table('user')->insert([
        	'type' => 'company',
            'username' => 'telkom',
            'email'    => 'telkom@email.com',
            'password' => 'password',
            'name' => 'Telkom',
            'contact' => 123456789,
            'address' => 'jl. abc',
            'postal_code' => 12345
        ]);
    }
}
