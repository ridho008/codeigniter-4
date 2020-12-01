<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Upload extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_upload'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'judul'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
            ]
        ]);
        $this->forge->addKey('id_upload', true);
        $this->forge->createTable('upload');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('upload');
	}
}
