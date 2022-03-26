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
    public function testIfUpdateEndpointExistsByModifyingARecord()
    {
        $book = Book::factory()->create();

        $oldTitle = $book->title;

        $response = $this->patch('/api/books/' . $book->id, ['title' => 'Barako']);

        $newTitle = Book::findOrFail($book->id)->first()->title;

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Barako']);
    }
}
