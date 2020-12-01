<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jurusan extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_jurusan'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'nama_jurusan'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
            ]
        ]);
        $this->forge->addKey('id_jurusan', true);
        $this->forge->createTable('jurusan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('jurusan');
	}
}
