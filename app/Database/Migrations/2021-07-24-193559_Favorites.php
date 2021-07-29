<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Favorites extends Migration
{
	public function up()
	{
		// $this->db->disableForeignKeyChecks();
		// $this->forge->addField([
		// 	'id'          => [
		// 			'type'           => 'INT',
		// 			'unsigned'       => true,
		// 			'auto_increment' => true,
		// 			'null' => false,
		// 	],
		// 	'company_id'       => [
		// 		'type'         => 'INT',
		// 		'unsigned'     => true,
		// 			'null' => false,
		// 	],
		// 	'owner_id'       => [
		// 		'type'       => 'INT',
		// 		'unsigned'     => true,
		// 		'null' => false,
		// 	],
		// 	'created_at' => [
		// 		'type' => 'DATETIME',
		// 		'null' => false,
		// 	],
		// 	'updated_at' => [
		// 		'type' => 'DATETIME',
		// 		'null' => true,
		// 	]
		// ]);
		// $this->forge->addKey('id', true);
		// $this->forge->addForeignKey('company_id','companies','id',);
		// $this->forge->createTable('favorites');
		// $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		// $this->forge->dropTable('favorites');
	}
}
