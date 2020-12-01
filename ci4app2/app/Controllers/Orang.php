<?php namespace App\Controllers;

use App\Models\OrangModel;
use CodeIgniter\I18n\Time;

class Orang extends BaseController {
	protected $orangModel;

	public function __construct()
	{
		$this->orangModel = new OrangModel();
	}

	public function index()
	{
		// $pager = \Config\Services::pager();
		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		// cari data berdasarkan keyword
		$keyword = $this->request->getVar('keyword');
		if($keyword) {
			$orang = $this->orangModel->search($keyword);
		} else {
			$orang = $this->orangModel;
		}

		$data = [
			'title' => 'Daftar Orang',
			// 'orang' => $this->orangModel->findAll()
			'orang' => $orang->paginate(5, 'orang'),
			'pager' => $this->orangModel->pager,
			'currentPage' => $currentPage
		];
		
		return view('orang/index', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Orang',
			'validation' => \Config\Services::Validation()
		];

		return view('orang/create', $data);
	}

	public function save()
	{
		if(!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi'
				]
			]
		])) {
			return redirect()->to('/orang/create')->withInput();
		}

		$this->orangModel->save([
			'nama' => $this->request->getVar('nama'),
			'alamat' => $this->request->getVar('alamat')
		]);

		session()->setFlashdata('pesan', 'Data Orang Berhasil Ditambahkan.');
		return redirect()->to('/orang');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Ubah Data Orang',
			'orang' => $this->orangModel->getOrang($id),
			'validation' => \Config\Services::validation()
		];

		return view('orang/edit', $data);
	}

	public function update($id)
	{
		// validation form
		if(!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi'
				]
			],
			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi'
				]
			]
		])) {
			return redirect()->to('/orang/edit/' . $this->request->getVar('id'))->withInput();
		}

		// insert data
		$this->orangModel->save([
			'id' => $this->request->getVar('id'),
			'nama' => $this->request->getVar('nama'),
			'alamat' => $this->request->getVar('alamat')
		]);

		session()->setFlashdata('pesan', 'Data Orang Berhasil Diubah');
		return redirect()->to('/orang');
	}

	public function delete($id)
	{
		$this->orangModel->delete($id);
		session()->setFlashdata('pesan', 'Data Orang Berhasil Dihapus.');
		return redirect()->to('/orang');
	}
	

}