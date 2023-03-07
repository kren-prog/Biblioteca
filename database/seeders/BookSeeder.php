<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->fill_JSON(public_path("/json/book.json"));
    }

    public function fill_JSON($path)
    {
        $decoded_json = file_get_contents($path);
        $book_json = json_decode($decoded_json, false);
 
        foreach($book_json as $current_book)
        {
            $book = new Book();
            $book->code = $current_book->id;
            $book->title = $current_book->title;
            $book->author = $current_book->author;
            $book->genre = $current_book->genre;
            $book->year = $current_book->year;
            $book->availability = true;
            $book->save();
        }
    }
}
