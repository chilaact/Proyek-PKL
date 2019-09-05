<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biodata')->insert([
            'nama' => 'Administrator',
            'tempat_lahir' => '-',
            'tanggal_lahir' => '1999-09-09',
            'telp' => '-',
            'alamat' => '-',
            'user_id' => 1,
        ]);

    }
}