<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book;

class BookStoreEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIfStoreEndpointExistsWithValidInputs()
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

    public function testIfStoreEndpointRejectsInvalidTitle()
    {
        $book = [
            'title' => 'Samp',
            'author' => 'Mongmong Barcos',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['title']);
        $response->assertStatus(302);
    }

    public function testIfStoreEndpointRejectsInvalidAuthor()
    {
        $book = [
            'title' => 'Sample Book',
            'author' => 'Mong',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['author']);
        $response->assertStatus(302);
    }

    
    public function testIfStoreEndpointRejectsInvalidDescription()
    {
        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Marcos',
            'description' => 'Tujo',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['description']);
        $response->assertStatus(302);
    }

    public function testIfStoreEndpointRejectsInvalidCategory()
    {
        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Marcos',
            'description' => 'Tujongs',
            'category' => 'Poli',
            'publishing_house' => 'GenSan',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['category']);
        $response->assertStatus(302);
    }

    public function testIfStoreEndpointRejectsInvalidPublishingHouse()
    {
        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Marcos',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenS',
            'publishing_date' => now()
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['publishing_house']);
        $response->assertStatus(302);
    }

    public function testIfStoreEndpointRejectsInvalidPublishingDate()
    {
        $book = [
            'title' => 'Sample Book',
            'author' => 'Mongmong Marcos',
            'description' => 'Tujongs',
            'category' => 'Politics',
            'publishing_house' => 'GenSan',
            'publishing_date' => 232
        ];

        $response = $this->post('/api/books', $book);

        $response->assertInvalid(['publishing_date']);
        $response->assertStatus(302);
    }
}
