<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ScholarshipComment extends Migration
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
            'scholarship_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'comment' => [
                'type'       => 'TEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('scholarship_id', 'scholarship', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('scholarship_comment');
	}

	public function down()
	{
		$this->forge->dropTable('scholarship_comment');
	}
}
