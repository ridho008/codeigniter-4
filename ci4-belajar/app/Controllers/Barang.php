<?php namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
	protected $barangModel;

	public function __construct()
	{
		$this->barangModel= new BarangModel();
	}
	public function index()
	{
		$data = [
			'title' => 'Barang'
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
