<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommitteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('committes')->insert([
            'name' => 'committes',
            'qrcode' => '',
            'nip' => '123132',
            'year' => '2024',
        ]);
    }
}
