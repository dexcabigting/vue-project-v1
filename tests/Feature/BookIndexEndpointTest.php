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

    // Test to Pass

    public function testIfEndpointExists()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function testIfEndpointRespondsWithExistingRecords()
    {
        $books = Book::factory()->count(3)->create();

        $bookTitles = $books->only(['title'])->all();

        $response = $this->get('/api/books');

        $response->assertStatus(200);

        $this->assertDatabaseCount('books', 3);

        $this->assertDatabaseHas('books', $bookTitles);
    }

    public function testIfEndpointRespondsWithEmptyRecords()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);

        $this->assertDatabaseCount('books', 0);
    }
}
