<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_product'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'product_name'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
            ],
            'product_desc' => [
                    'type'           => 'TEXT',
                    'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_product', true);
        $this->forge->createTable('product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('product');
	}
}
