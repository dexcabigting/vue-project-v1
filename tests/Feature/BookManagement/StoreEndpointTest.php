<?php

namespace Tests\Feature\BookManagement;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class StoreEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Test to Pass

    public function testIfEndpointExistsWithValidFormInputs()
    {
        $this->withoutExceptionHandling();

        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Barcos',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $this->assertDatabaseHas('books', ['title' => $book['title']]);

        $this->assertEquals(1, Book::count());

        $response->assertStatus(201);
    }

    // Test to Fail

    public function testIfEndpointFailsWhenOneOrMoreFormInputsAreMissing()
    {
        $book = [
            'title' => null,
            'author' => null,
            'description' => null,
            'category' => null,
            'publishing_house' => null,
            'publishing_date' => null
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['title', 'author', 'description', 'category', 'publishing_house', 'publishing_date']);
        $response->assertStatus(302);
    }

    public function testIfEndpointFailsWhenOneOrMoreFormInputsAreInvalid()
    {
        $book = [
            'title' => '1234',
            'author' => '1234',
            'description' => '1234',
            'category' => '1234',
            'publishing_house' => '1234',
            'publishing_date' => '1234'
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['title', 'author', 'description', 'category', 'publishing_house', 'publishing_date']);
        $response->assertStatus(302);
    }
}
