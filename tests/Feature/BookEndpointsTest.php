<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
