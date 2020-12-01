<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_user'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'nama_user'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'null'           => true
            ],
            'username'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'null'           => true
            ],
            'password'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                    'null'           => true
            ],
            // 1 = Administrator
            // 2 = User
            'role'       => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'null'           => true
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
