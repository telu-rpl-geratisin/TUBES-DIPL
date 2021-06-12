<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'type' => [
                'type'           => 'ENUM',
                'constraint'     => ['admin', 'public', 'company']
        	],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'contact' => [
                'type' => 'INT',
                'constraint' => '15',
                'null' => true
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'postal_code' => [
                'type' => 'INT',
                'constraint' => '10'
            ],
            'is_verified' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 'N'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
