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

    public function testIfUpdateEndpointFailsIfThereAreNoRecords()
    {
        $response = $this->patch('/api/books/1', ['title' => 'Jejomar Binay']);

        $response->assertStatus(404);
    }

    public function testIfUpdateEndpointFailsByModifyingARecordWithInvalidInputs()
    {
        $book = Book::factory()->create();

        $invalidData = [
            'title' => 'Leni',
            'author' => 'Luga',
            'category' => '1313',
            'description' => '1233',
            'publishing_house' => '1233',
            'publishing_date' => '1332',
        ];

        $response = $this->patch('/api/books/' . $book->id, $invalidData);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('books', $invalidData);
    }
}
