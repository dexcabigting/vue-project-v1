<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class BookUpdateEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Test to Pass

    public function testIfUpdateEndpointExistsByModifyingARecord()
    {
        $book = Book::factory()->create();

        $response = $this->patch('/api/books/' . $book->id, ['title' => 'Barako']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Barako']);
    }

    // Test to Fail
}
