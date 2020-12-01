<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		// $faker = \Faker\Factory::create();
		// dd($faker->name);
		$data = [
			'title' => 'Home'
		];
		return view('pages/home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About'
		];
		return view('pages/about', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact Us',
			'alamat' => [
				[
					'tipe' => 'rumah',
					'alamat' => 'Jl.pepaya',
					'kota' => 'pekanbaru'
				],
				[
					'tipe' => 'kantor',
					'alamat' => 'Jl.Rantau',
					'kota' => 'bekasi'
				]
			]
		];
		return view('pages/contact', $data);
	}

}
