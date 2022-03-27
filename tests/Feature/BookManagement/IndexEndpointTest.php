<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Book;

class IndexEndpointTest extends TestCase
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
        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
    }

    public function testIfEndpointRespondsWithExistingRecords()
    {
        $books = Book::factory()->count(3)->create();

        $bookTitles = $books->only(['title'])->all();

        $response = $this->get(route('books.index'));

        $response->assertStatus(200);

        $this->assertDatabaseCount('books', 3);

        $this->assertDatabaseHas('books', $bookTitles);
    }

    public function testIfEndpointRespondsWithEmptyRecords()
    {
        $response = $this->get(route('books.index'));

        $response->assertStatus(200);

        $this->assertDatabaseCount('books', 0);
    }
}
