<?php namespace App\Controllers;

use App\Models\UploadsModel;

class Uploads extends BaseController
{
	protected $uploadModel;

	public function __construct()
	{
		$this->uploadModel = new UploadsModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Uploads Multiple',
			'validation' => \Config\Services::validation(),
			'uri' => service('uri')
		];
		return view('uploads/index', $data);
	}

	public function multiple()
	{
		if(!$this->validate([
			'judul' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar maksimal 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'yang adan pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/uploads')->withInput();
		}

		// ambil field name input gambar Array
		$fileGambar = $this->request->getFiles();

		if($fileGambar) {
			// insert DB upload
			$this->uploadModel->save([
				'judul' => $this->request->getVar('judul')
			]);
			// acak nama file gambar
			// $gambarRandom = $fileGambar->getRandomName();
			// pindahkan
			// $fileGambar->move('assets/img/uploads', $gambarRandom);

			foreach ($fileGambar['gambar'] as $key => $value) {
				$data = [
					'id_upload' => 1,
					'gambar' => $value->getRandomName()
				];

				$this->uploadModel->insertDB('galeri', $data);
				$value->move('assets/img/uploads', $value->getRandomName());
			}
			session()->setFlashdata('pesan', 'Gambar Berhasil Ditambahkan.');
			return redirect()->to('/uploads');
		}


	}

	//--------------------------------------------------------------------

}
