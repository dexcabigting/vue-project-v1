<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Book;

class BookIndexEndpointTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIfIndexEndpointExists()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function testIndexEndpointWithExistingRecords()
    {
        $books = Book::factory()->count(3)->create();

        $bookTitles = $books->only(['title'])->all();

        $response = $this->get('/api/books');

        $response->assertStatus(200);

        $this->assertEquals(3, Book::count());

        $this->assertDatabaseHas('books', $bookTitles);
    }

    public function testIndexEndpointWithEmptyRecords()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);

        $this->assertEquals(0, Book::count());
    }
}
