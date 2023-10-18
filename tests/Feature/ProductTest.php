<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/index');

        $response->assertStatus(200);
        $response->assertSee(__('No products'));
    }
}
