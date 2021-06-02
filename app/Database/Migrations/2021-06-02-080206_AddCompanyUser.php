<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCompanyUser extends Migration
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
            'company_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'postal_code' => [
                'type' => 'INT',
                'constraint' => '10'
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->createTable('company_user');
	}

	public function down()
	{
        $this->forge->dropTable('company_user');
	}
}
