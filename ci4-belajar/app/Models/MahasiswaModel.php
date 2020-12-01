<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
	protected $table = 'mahasiswa';
	protected $primaryKey = 'id_mahasiswa';
	protected $allowedFields = ['nama_mhs', 'id_fakultas', 'id_jurusan', 'photo'];
	// protected $allowedFields = ['nama_mahasiswa', 'product_desc'];

	public function joinMahasiswa()
	{
		$this->db->table('mahasiswa');
		$this->select('*');
		$this->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan');
		$this->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas');
		return $this->get()->getResultArray();
	}

	public function getTabel($table)
	{
		return $this->db->table($table);
	}
}