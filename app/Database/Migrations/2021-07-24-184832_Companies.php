<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Companies extends Migration
{
	public function up()
	{
		// $this->forge->addField([
		// 	'id'          => [
		// 			'type'           => 'INT',
		// 			'unsigned'       => true,
		// 			'auto_increment' => true,
		// 	],
		// 	'name'       => [
		// 			'type'       => 'VARCHAR',
		// 			'constraint' => '100',
		// 			'null' => false,
		// 	],
		// 	'CIF'       => [
		// 		'type'       => 'VARCHAR',
		// 		'constraint' => '9',
		// 		'null' => false,
		// 		'unique' => true,
		// 	],
		// 	'shortdesc' => [
		// 			'type' => 'VARCHAR',
		// 			'constraint' => '100',
		// 			'null' => true,
		// 	],
		// 	'description' => [
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '8000',
		// 		'null' => false,
		// 	],
		// 	'email' => [
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '250',
		// 		'null' => false,
		// 	],
		// 	'CCC' => [
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '20',
		// 		'null' => true,
		// 	],
		// 	'date' => [
		// 		'type' => 'DATE',
		// 		'null' => true,
		// 	],
		// 	'created_at' => [
		// 		'type' => 'DATETIME',
		// 		'null' => true,
		// 	],
		// 	'updated_at' => [
		// 		'type' => 'DATETIME',
		// 		'null' => true,
		// 	],
		// 	'status' => [
		// 		'type' => 'BOOL',
		// 		'null' => true,
		// 	],
		// 	'logo' => [
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',
		// 		'null' => false,
		// 	]
		// ]);
		// $this->forge->addKey('id', true);
		// $this->forge->createTable('companies');
	}

	public function down()
	{
		// $this->forge->dropTable('companies');
	}
}
