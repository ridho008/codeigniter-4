<?php namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
	protected $productModel;

	public function __construct()
	{
		$this->productModel = new ProductModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Product',
			'product' => $this->productModel->findAll(),
			'uri' => service('uri')
		];
		return view('product/index', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Add New Product',
			'validation' => \Config\Services::validation(),
			'uri' => service('uri')
		];
		return view('product/create', $data);
	}

	public function save()
	{
		if(!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			],
			'desc' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			]
		])) {
			return redirect()->to('/product/create')->withInput();
		}

		$this->productModel->save([
			'product_name' => $this->request->getVar('name'),
			'product_desc' => $this->request->getVar('desc')
		]);

		session()->setFlashdata('pesan', 'Add Product Success.');
		return redirect()->to('/product');
	}

	public function edit($id_product)
	{
		$data = [
			'title' => 'Update Product',
			'validation' => \Config\Services::validation(),
			'product' => $this->productModel->getProduct($id_product),
			'uri' => service('uri')
		];
		return view('product/edit', $data);
	}

	public function update($id_product)
	{
		if(!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			],
			'desc' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			]
		])) {
			return redirect()->to('/product/edit/' . $this->request->getVar('id_product'))->withInput();
		}

		$this->productModel->save([
			'id_product' => $this->request->getVar('id_product'),
			'product_name' => $this->request->getVar('name'),
			'product_desc' => $this->request->getVar('desc')
		]);

		session()->setFlashdata('pesan', 'Update Product Success');
		return redirect()->to('/product');
	}

	public function delete($id_product)
	{
		$this->productModel->delete($id_product);
		session()->setFlashdata('pesan', 'Product Delete Success.');
		return redirect()->to('/product');
	}

	//--------------------------------------------------------------------

}
