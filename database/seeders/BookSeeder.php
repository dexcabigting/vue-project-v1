<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'title' => 'Tiktik',
                'author' => 'Dingdong Dantes',
                'category' => 'Bold',
                'description' => 'Rated 18+',
                'publishing_house' => 'MCC',
                'publishing_date' => now(),
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'title' => 'Betlog',
                'author' => 'Sir Bamba',
                'category' => 'IOT',
                'description' => 'wala hahaha',
                'publishing_house' => 'MIS',
                'publishing_date' => now(),
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'title' => 'OJT',
                'author' => 'Maam Zabala',
                'category' => 'maternity leave',
                'description' => 'moa signing',
                'publishing_house' => 'IBCE',
                'publishing_date' => now(),
                'created_at' => now(),
                'updated_at' => now() 
            ]
        ];

        Book::insert($books);
    }
}
