<?php

namespace Database\Seeders;

use App\Models\sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat Faker
        $faker = fake('id_ID');

        for($i = 0; $i < 3; $i++){
            sekolah::create([
                'nama_sekolah' => $faker->city()
            ]);
        }
    }
}
