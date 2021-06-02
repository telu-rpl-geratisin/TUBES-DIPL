<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPublicUser extends Migration
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
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => '15',
                'null' => true
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
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
        $this->forge->createTable('public_user');
	}

	public function down()
	{
        $this->forge->dropTable('public_user');
	}
}
