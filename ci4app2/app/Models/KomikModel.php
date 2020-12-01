<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
	protected $table = 'komik';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

	public function getKomik($slug = false)
	{
		// jika tidak ada slug (DB)
		if($slug == false) {
			return $this->findAll();
		}

		// jika ada
		return $this->where(['slug' => $slug])->first();
	}
}