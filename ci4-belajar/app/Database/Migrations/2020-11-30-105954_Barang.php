<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_barang'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'nama_barang'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'null'           => true
            ],
            'harga'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'null'           => true
            ],
            'stok'       => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'null'           => true
            ]
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('barang');
	}
}
