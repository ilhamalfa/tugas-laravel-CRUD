<?php

namespace Database\Seeders;

use App\Models\siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat Faker
        $faker = fake('ko_KR');

        for($i = 0; $i < 30; $i++){
            siswa::create([
                'nis' => $faker->randomNumber(5, true),
                'nama' => $faker->name(),
                'alamat' => $faker->address(),
                'sekolah_id' => $faker->numberBetween(1,3)
            ]);
        }
    }
}
