<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Owners extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'owner_id'       => [
					'type'       => 'INT',
					'null' => false,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '250',
				'null' => false,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '250',
				'null' => false,
			],
			'gender' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => false,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('owners');
	}

	public function down()
	{
		$this->forge->dropTable('owners');
	}
}
