<?php namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
	protected $mahasiswaModel;

	public function __construct()
	{
		$this->mahasiswaModel = new MahasiswaModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'mahasiswa' => $this->mahasiswaModel->findAll(),
			'uri' => service('uri')
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
