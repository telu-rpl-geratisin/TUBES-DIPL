<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddScholarship extends Migration
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
            'user_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'scholarship_default_photo.jpg',
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'end_date' => [
                'type' => 'DATE'
            ],
            'link' => [
                'type' => 'TEXT'
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
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('scholarship');
	}

	public function down()
	{
		$this->forge->dropTable('scholarship');
	}
}
