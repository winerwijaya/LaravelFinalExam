<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebooks')->insert([
            [
                'title' => 'ASDFG',
                'author' => 'Angel',
                'description'=> 'this is book description ASDFG'
            ],
            [
                'title' => 'ABCDE',
                'author' => 'Budi',
                'description'=> 'this is book description ABCDE'
            ],
            [
                'title' => 'Buku 4',
                'author' => 'Ferry',
                'description'=> 'this is book description Buku 4'
            ],
            [
                'title' => 'Investment',
                'author' => 'Viona',
                'description'=> 'this is book description buku Investment'
            ],
            [
                'title' => 'Horror',
                'author' => 'Elisa',
                'description'=> 'this is book description Horror'
            ],
            
        ]);
    }
}
