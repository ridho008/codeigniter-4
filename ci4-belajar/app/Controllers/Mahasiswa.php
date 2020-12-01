<?php namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\I18n\Time;

class Mahasiswa extends BaseController
{
	protected $mahasiswaModel;
	protected $uriSegment;

	public function __construct()
	{
		$this->mahasiswaModel = new MahasiswaModel();
		$this->uriSegment = new \CodeIgniter\HTTP\URI();
		$pager = \Config\Services::pager();
	}

	public function index()
	{
		$data = [
			'title' => 'Mahasiswa',
			'mahasiswa' => $this->mahasiswaModel->paginate(2, 'mahasiswa'),
			'pager' => $this->mahasiswaModel->pager,
			'uri' => service('uri')
		];
		return view('mahasiswa/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Tambah Data Mahasiswa',
			'fakultas' => $this->mahasiswaModel->getTabel('fakultas')->get(),
			'jurusan' => $this->mahasiswaModel->getTabel('jurusan')->get(),
			'validation' => \Config\Services::validation(),
			'uri' => service('uri')
		];
		return view('mahasiswa/tambah', $data);
	}

	public function simpan()
	{
		if(!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'fakultas' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'photo' => [
				'rules' => 'max_size[photo,1000]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran photo maksimal 1MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'yang adan pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/mahasiswa/tambah')->withInput();
		}

		// ambil field name photo
		$filePhoto = $this->request->getFile('photo');
		$filePhoto->move('assets/img');
		$namaPhoto = $filePhoto->getName();

		// Insert ke DB
		$this->mahasiswaModel->save([
			'nama_mhs' => $this->request->getVar('nama'),
			'id_fakultas' => $this->request->getVar('fakultas'),
			'id_jurusan' => $this->request->getVar('jurusan'),
			'photo' => $namaPhoto
		]);

		session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil Ditambahkan.');
		return redirect()->to('/mahasiswa');
	}

	public function hapus($id)
	{
		// select * from table where id
		$mahasiswa = $this->mahasiswaModel->find($id);
		if($mahasiswa['photo']) {
			unlink('assets/img/' . $mahasiswa['photo']);
		}
		$this->mahasiswaModel->delete($id);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to('/mahasiswa');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Ubah Data Mahasiswa',
			'mahasiswa' => $this->mahasiswaModel->find($id),
			'validation' => \Config\Services::validation(),
			'fakultas' => $this->mahasiswaModel->getTabel('fakultas')->get(),
			'jurusan' => $this->mahasiswaModel->getTabel('jurusan')->get(),
			'uri' => service('uri')
		];
		return view('mahasiswa/edit', $data);
	}

	public function update($id)
	{
		if(!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => '{field} harus di isi.'
			],
			'fakultas' => [
				'rules' => 'required',
				'errors' => '{field} wajib di isi'
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => '{field} wajib di isi'
			],
			'photo' => [
				'rules' => 'max_size[photo,1000]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran photo maksimal 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'yang adan pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/mahasiswa/edit/' . $id)->withInput();
		}

		// ambil photo
		$filePhoto = $this->request->getFile('photo');

		if($filePhoto->getError() == 4) {
			$namaPhoto = $this->request->getVar('photoLama');
		} else {
			// generete nama photo
			$namaPhoto = $filePhoto->getRandomName();
			// pindahkan ke folder img
			$filePhoto->move('assets/img', $namaPhoto);
			// hapus hapus di folder /replace
			unlink('assets/img/' . $this->request->getVar('photoLama'));
		}

		// update data
		$this->mahasiswaModel->save([
			'id_mahasiswa' => $this->request->getVar('id_mahasiswa'),
			'nama_mhs' => $this->request->getVar('nama'),
			'nim' => $this->request->getVar('nim'),
			'id_fakultas' => $this->request->getVar('fakultas'),
			'id_jurusan' => $this->request->getVar('jurusan'),
			'photo' => $namaPhoto
		]);

		session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
		return redirect()->to('/mahasiswa');
	}


}
