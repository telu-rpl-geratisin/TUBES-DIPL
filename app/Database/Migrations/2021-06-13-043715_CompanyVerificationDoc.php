<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyVerificationDoc extends Migration
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
            'company_user_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'document' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addForeignKey('company_user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('company_verification_doc');
	}

	public function down()
	{
		$this->forge->dropTable('company_verification_doc');
	}
}
