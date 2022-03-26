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
        $this->withoutExceptionHandling();

        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function testIfIndexEndpointHasBookRecords()
    {
        $this->withoutExceptionHandling();

        $books = Book::factory()->count(3)->create();

        $bookTitles = $books->only(['title'])->all();

        $response = $this->get('/api/books');

        $response->assertStatus(200);

        $this->assertEquals(3, Book::count());

        $this->assertDatabaseHas('books', $bookTitles);
    }
}
