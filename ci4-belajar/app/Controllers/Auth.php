<?php namespace App\Controllers;

use App\Models\LoginModel;

class Auth extends BaseController
{
	protected $loginModel;

	public function __construct()
	{
		$this->loginModel = new LoginModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Halaman Login',
			'validation' => \Config\Services::validation()
		];
		return view('auth/login', $data);
	}

	public function login()
	{
		if(!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'
				]
			]
		])) {
			return redirect()->to('/auth')->withInput();
		}

		$username = $this->request->getPost('username');
		$password = sha1($this->request->getPost('password'));

		$cek = $this->loginModel->cek_login($username, $password);

		if( ($cek['username'] == $username) && ($cek['password'] == $password) ) {
			session()->set('username', $cek['username']);
			session()->set('nama', $cek['nama_user']);
			session()->set('role', $cek['role']);
			return redirect()->to('/home');
		} else {
			session()->setFlashdata('pesan', 'Username/Password Salah!');
			return redirect()->to('/auth');
		}
	}

	public function protec_hal()
	{

	}

	public function logout()
	{
		session()->remove('username');
		session()->remove('nama');
		session()->remove('role');
		session()->setFlashdata('success', 'Berhasil Logout.');
		return redirect()->to('/auth');
	}

	//--------------------------------------------------------------------

}
