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
    public function testIfShowEndpointExistsByRetrievingARecord()
    {
        $book = Book::factory()->create();

        $response = $this->get('/api/books/' . $book->id);

        $response->assertStatus(200);
    }
}
