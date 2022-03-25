<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Book;

class BookEndPointsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexEndpoint()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function testStoreEndpoint()
    {
        $bookData = [
            'title' => 'Betlog ni Muriel',
            'author' => 'Shehyee',
            'category' => 'Hiphop',
            'description' => 'Aezakmi',
            'publishing_house' => 'Children of Sir Jo Incorporated',
            'publishing_date' => now(),
        ];

        $response = $this->post('/api/books', $bookData);

        $response->assertStatus(201);
    }

    public function testShowEndpoint()
    {
        $bookData = [
            'title' => 'Betlog ni Muriel',
            'author' => 'Shehyee',
            'category' => 'Hiphop',
            'description' => 'Aezakmi',
            'publishing_house' => 'Children of Sir Jo Incorporated',
            'publishing_date' => now(),
        ];

        $book = Book::create($bookData);

        $this->assertDatabaseHas('books', $bookData);

        $response = $this->get('/api/books/' . $book->id);

        $response->assertStatus(200);
    }

    public function testUpdateEndpoint()
    {
        $bookData = [
            'title' => 'Betlog ni Muriel',
            'author' => 'Shehyee',
            'category' => 'Hiphop',
            'description' => 'Aezakmi',
            'publishing_house' => 'Children of Sir Jo Incorporated',
            'publishing_date' => now(),
        ];

        $newBookData = [
            'title' => 'Ngipin ni Chel',
            'author' => 'Leni Rob-redo',
            'category' => 'Politics',
            'description' => 'Tuta ng Estados Unidos',
            'publishing_house' => 'Liberal Party',
            'publishing_date' => now(),
        ];

        $book = Book::create($bookData);

        $this->assertDatabaseHas('books', $bookData);

        $response = $this->patch('/api/books/' . $book->id, $newBookData);

        $response->assertStatus(200);
    }

    public function testDestroyEndpoint()
    {
        $bookData = [
            'title' => 'Betlog ni Muriel',
            'author' => 'Shehyee',
            'category' => 'Hiphop',
            'description' => 'Aezakmi',
            'publishing_house' => 'Children of Sir Jo Incorporated',
            'publishing_date' => now(),
        ];

        $book = Book::create($bookData);

        $this->assertDatabaseHas('books', $bookData);

        $response = $this->delete('/api/books/' . $book->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('books', $bookData);
    }
}
