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
                'constraint' => '255',
                'unique' => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'user_default_photo.jpg',
                'null' => true
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
                'constraint' => '10',
                'null' => true
            ],
            'status' => [
                'type'           => 'ENUM',
                'constraint'     => ['verified', 'unverified', 'denied'],
                'default' => 'unverified'
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
