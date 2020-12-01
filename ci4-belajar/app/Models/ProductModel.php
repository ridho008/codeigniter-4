<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table = 'product';
	protected $primaryKey = 'id_product';
	protected $allowedFields = ['product_name', 'product_desc'];

	public function getProduct($id_product)
	{
		return $this->where(['id_product' => $id_product])->first();
	}
}