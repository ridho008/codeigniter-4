<?php namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'ridho',
        //         'alamat'    => 'jl.pepaya',
        //         'create_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'surya',
        //         'alamat'    => 'jl.hanaro',
        //         'create_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ]
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for($i = 0; $i < 30; $i++) {
            $data = [
                    'nama' => $faker->name,
                    'alamat'    => $faker->address,
                    'created_at' => Time::now(),
                    'updated_at' => Time::now()
            ];
            $this->db->table('orang')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO orang (nama, alamat, create_at, updated_at) VALUES(:nama:, :alamat:, :create_at:, :updated_at:)",
                // $data
        // );

        // Using Query Builder
    }
}