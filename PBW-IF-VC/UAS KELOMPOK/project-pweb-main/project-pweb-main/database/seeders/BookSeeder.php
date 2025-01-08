<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'To Kill a Mockingbird',
                'writer' => 'Harper Lee',
                'publisher' => 'J.B. Lippincott & Co.',
                'synopsis' => 'Novel ini bercerita tentang kehidupan Scout Finch, dan bagaimana dia belajar tentang kebaikan dan kejahatan.',
                'stock' => 10,
                'price' => 150000,
            ],
            [
                'title' => '1984',
                'writer' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'synopsis' => '1984 adalah sebuah novel dystopian yang menggambarkan kehidupan di bawah rezim totalitarian.',
                'stock' => 7,
                'price' => 125000,
            ],
            [
                'title' => 'The Great Gatsby',
                'writer' => 'F. Scott Fitzgerald',
                'publisher' => 'Charles Scribner\'s Sons',
                'synopsis' => 'The Great Gatsby adalah sebuah novel yang menggambarkan era Jazz Age dan "American Dream".',
                'stock' => 5,
                'price' => 200000,
            ],
            // Tambahkan data buku lainnya di sini
        ];

        foreach ($data as $book) {
            Book::create($book);
        }
        // Book::factory()->count(50)->create();
    }
}
