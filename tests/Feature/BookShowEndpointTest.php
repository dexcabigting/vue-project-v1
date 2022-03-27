<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class BookShowEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Test to Pass

    public function testIfShowEndpointExistsByRetrievingARecord()
    {
        $book = Book::factory()->create();

        $response = $this->get('/api/books/' . $book->id);

        $this->assertDatabaseHas('books', ['id' => $book->id]);
        $response->assertStatus(200);
    }

    public function testIfShowEndpointRejectsNonExistentRecord()
    {
        $response = $this->get('/api/books/' . 1);

        $this->assertDatabaseMissing('books', ['id' => 1]);
        $response->assertStatus(404);
    }

    public function testIfShowEndpointRejectsInvalidId()
    {
        $response = $this->get('/api/books/' . 'adwwq');

        $response->assertStatus(404);
    }

    // Test to Fail
}
