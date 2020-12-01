<?php namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
	protected $table = 'upload';
	protected $allowedFields = ['judul'];

	public function insertDB($table, $data)
	{
		return $this->db->table("$table")->insert($data);
	}
}