<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddScholarshipRating extends Migration
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
            'scholarship_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'rating' => [
                'type'       => 'FLOAT',
                'constraint' => 5
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
        $this->forge->addForeignKey('scholarship_id', 'scholarship', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['user_id', 'scholarship_id']);
        $this->forge->createTable('scholarship_rating');
	}

	public function down()
	{
		$this->forge->dropTable('scholarship_rating');
	}
}
