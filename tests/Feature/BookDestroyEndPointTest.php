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
    public function testIfDestroyEndpointExistsByDeletingARecord()
    {
        $book = Book::factory()->create();

        $response = $this->delete('/api/books/' . $book->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
