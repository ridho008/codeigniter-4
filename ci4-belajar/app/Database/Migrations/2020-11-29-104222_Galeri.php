<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_galeri'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'id_upload'       => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'gambar' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'null'           => true,
            ]
        ]);
        $this->forge->addKey('id_galeri', true);
        $this->forge->createTable('galeri');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('galeri');
	}
}
