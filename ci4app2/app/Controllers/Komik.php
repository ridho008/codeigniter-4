<?php namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController {
	protected $komikModel;

	public function __construct()
	{
		$this->komikModel = new KomikModel();
	}

	public function index()
	{
		// $komik = $this->komikModel->findAll();
		$data = [
			'title' => 'Daftar Komik',
			'komik' => $this->komikModel->getKomik()
			// 'komik' => $komik
		];

		// cara konek DB tanpa model
		// $db = \Config\Database::connect();
		// $komik = $db->query("SELECT * FROM komik");
		// dd($komik);
		// foreach($komik->getResultArray() as $row) {
		// 	d($row);
		// }

		// konek db dengan model
		// $komikModel = new \App\Models\KomikModel;
		// $komikModel = new KomikModel();
		// $komik = $this->komikModel->findAll();
		// dd($komik);
		
		return view('komik/index', $data);
	}

	public function details($slug)
	{
		$komik = $this->komikModel->getKomik($slug);
		// dd($komik);
		$data = [
			'title' => 'Detail Komik ' . $komik['judul'],
			'komik' => $komik
		];

		if(empty($komik)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Komik $slug Tidak Ditemukan.");
			
		}

		return view('komik/detail', $data);
	}

	public function create()
	{
		// session();
		// $validation->listErrors();
		$data = [
			'title' => 'Form Tambah Data Komik',
			'validation' => \Config\Services::validation()
		];

		return view('komik/create', $data);
	}

	public function save()
	{
		// mendapatkan semua name pada inputan
		// dd($this->request->getVar());

		// validation form
		if(!$this->validate([
			'judul' => [
				'rules' => 'required|is_unique[komik.judul]',
				'errors' => [
					'required' => '{field} komik harus di isi.',
					'is_unique' => '{field} sudah terdaftar' 
				]
			],
			'penulis' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			],
			'penerbit' => [
				'rules' => 'required',
				'errors' => '{field} wajib di isi'
			],
			'sampul' => [
				'rules' => 'max_size[sampul,2024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran sampul maksimal 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'yang adan pilih bukan gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
			return redirect()->to('/komik/create')->withInput();
		}
		

		// ambil gambar
		$fileSampul = $this->request->getFile('sampul');
		// apakah tidak ada gambar yang di upload
		if($fileSampul->getError() == 4) {
			$namaSampul = 'default.png';
		} else {
			// generate namaSampul random
			$namaSampul = $fileSampul->getRandomName();
			// pindahkan file ke folder img
			$fileSampul->move('assets/img', $namaSampul);
		}
		// dd($fileSampul);
		// ambil nama file
		// $namaSampul = $fileSampul->getName();

		// url_title = mengubah string menjadi huruf kecil dan spasinya hilang, spasinya di ganti apa, default nya (-)
		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->komikModel->save([
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $namaSampul
		]);

		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
		return redirect()->to('/komik');
	}

	public function delete($id)
	{
		// cari gambar berdasarkan id
		$komik = $this->komikModel->find($id);

		// cek jika file gambarnya defaut.png
		if($komik['sampul'] != 'default.png') {
			// hapus gambar
			unlink('assets/img/' . $komik['sampul']);
		}
		$this->komikModel->delete($id);
		session()->setFlashdata('pesan', 'Komik Berhasil Dihapus.');
		return redirect()->to('/komik');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Form Ubah Data Komik',
			'validation' => \Config\Services::validation(),
			'komik' => $this->komikModel->getKomik($slug)
		];

		return view('komik/edit', $data);
	}

	public function update($id)
	{
		// dd($this->request->getVar());

		// cek judul
		$komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
		if($komikLama['judul'] == $this->request->getVar('judul')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[komik.judul]';
		}

		// validation form
		if(!$this->validate([
			'judul' => [
				'rules' => $rule_judul,
				'errors' => [
					'required' => '{field} komik harus di isi.',
					'is_unique' => '{field} sudah terdaftar' 
				]
			],
			'penulis' => [
				'rules' => 'required',
				'errors' => '{field} komik harus di isi.'
			],
			'penerbit' => [
				'rules' => 'required',
				'errors' => '{field} wajib di isi'
			],
			'sampul' => [
				'rules' => 'max_size[sampul,2024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran sampul maksimal 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'yang adan pilih bukan gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$fileSampul = $this->request->getFile('sampul');

		// cek gambar, apakah gambar  lama di pakai
		if($fileSampul->getError() == 4) {
			$namaSampul = $this->request->getVar('sampulLama');
		} else {
			// generate nama file sampul
			$namaSampul = $fileSampul->getRandomName();
			// pindahkan gambar
			$fileSampul->move('assets/img', $namaSampul);
			// hapus file lama
			unlink('assets/img/' . $this->request->getVar('sampulLama'));
		}

		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->komikModel->save([
			'id' => $id,
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $namaSampul
		]);

		session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
		return redirect()->to('/komik');
	}

}