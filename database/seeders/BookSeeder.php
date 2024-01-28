<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();

        $books = Book::factory(10)->create();

        /** @var Book $book */
        foreach ($books as $book) {
            $book->categories()->sync($categories->random(rand(1, 4))->pluck('id')->toArray());
            $book->tags()->sync($tags->random(rand(1, 4))->pluck('id')->toArray());
        }
    }



}
