<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bencana;
use Carbon\Carbon;

class BencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Bencana::factory(10)->create();
        DB::table('bencana')->insert([
            [
                'name' => 'Gunung Kelud Meletus',
                'tanggal' => Carbon::parse('2014-02-13'),
                'waktu' => '12:34:40',
                'lokasi' => 'Blitar, Malang, Kediri',
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Agency',
                'email' => 'agency@app.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'End',
                'email' => 'endcustomer@app.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
