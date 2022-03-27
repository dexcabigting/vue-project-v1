<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class BookDestroyEndPointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Test to Pass

    public function testIfEndpointExistsByDeletingAValidRecord()
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', ['book' => $book]));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    // Test to Fail

    public function testIfEndpointFailsByDeletingANonExistentRecord()
    {
        $response = $this->delete('/api/books/1');

        //route('books')

        $this->assertDatabaseMissing('books', ['id' => 1]);
        $response->assertStatus(404);
    }
}
