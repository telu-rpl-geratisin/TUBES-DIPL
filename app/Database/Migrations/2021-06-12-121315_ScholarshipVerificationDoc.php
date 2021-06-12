<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ScholarshipVerificationDoc extends Migration
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
                'type' => 'INT',
                'unsigned' => true
            ],
            'document' => [
                'type' => 'TEXT',
                'unique' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('scholarship_id', 'scholarship', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('scholarship_verification_doc');
	}

	public function down()
	{
		$this->forge->dropTable('scholarship_verification_doc');
	}
}
