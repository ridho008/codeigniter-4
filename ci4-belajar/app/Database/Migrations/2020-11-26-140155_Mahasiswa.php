<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_mahasiswa'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'nama_mhs'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
            ],
            'id_fakultas' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'null'           => true,
            ],
            'id_jurusan' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'null'           => true,
            ],
            'photo' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '256',
                    'null'           => true,
            ]
        ]);
        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('mahasiswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('mahasiswa');
	}
}
