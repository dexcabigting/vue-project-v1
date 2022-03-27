<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class ShowEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Test to Pass

    public function testIfEndpointExistsByRetrievingARecord()
    {
        $book = Book::factory()->create();

        $response = $this->get(route('books.show', ['book' => $book]));

        $this->assertDatabaseHas('books', ['id' => $book->id]);
        $response->assertStatus(200);
    }

    // Test to Fail

    public function testIfEndpointRejectsNonExistentRecord()
    {
        $response = $this->get(route('books.show', ['book' => 1]));

        $this->assertDatabaseMissing('books', ['id' => 1]);
        $response->assertStatus(404);
    }

    public function testIfEndpointRejectsInvalidRecordId()
    {
        $response = $this->get(route('books.show', ['book' => 'aqwsd']));

        $response->assertStatus(404);
    }
}
