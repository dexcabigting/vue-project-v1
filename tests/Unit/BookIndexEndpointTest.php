<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;

class BookIndexEndpointTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIfIndexHasBookRecords()
    {
        $books = Book::factory(5)->create();

        $this->assertTrue(true);
        $this->assertDatabaseHas('books', [$books]);
    }
}
