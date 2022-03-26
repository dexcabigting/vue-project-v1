<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class BookStoreEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIfStoreEndpointExists()
    {
        $this->withoutExceptionHandling();

        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Barcos',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $this->assertDatabaseHas('books', ['title' => $book['title']]);

        $this->assertEquals(1, Book::count());

        $response->assertStatus(201);
    }
}
