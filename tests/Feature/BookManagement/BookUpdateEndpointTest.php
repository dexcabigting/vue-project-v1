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

    public function testIfEndpointExistsWithValidFormInputs()
    {
        $book = Book::factory()->create();

        $validData = [
            'title' => 'Barako',
            'author' => 'Redbull',
            'category' => 'Action Drama',
            'description' => 'Shut up',
            'publishing_house' => 'Tujong',
            'publishing_date' => now()
        ];

        $response = $this->put('/api/books/' . $book->id, $validData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', $validData);
    }

    // Test to Fail

    public function testIfEndpointFailsWhenARecordIsNonExistent()
    {
        $response = $this->patch('/api/books/1', ['title' => 'Jejomar Binay']);

        $response->assertStatus(404);
    }

    public function testIfEndpointFailsWhenOneOrMoreFormInputsAreMissing()
    {
        $book = Book::factory()->create();

        $invalidData = [
            'title' => null,
            'author' => null,
            'category' => null,
            'description' => null,
            'publishing_house' => null,
            'publishing_date' => null,
        ];

        $response = $this->patch('/api/books/' . $book->id, $invalidData);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('books', $invalidData);
    }

    public function testIfEndpointFailsWhenOneOrMoreFormInputsAreInvalid()
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
