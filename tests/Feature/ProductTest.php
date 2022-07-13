<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_list_products()
    {
        $this->get('api/products')
            ->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'price',
                    'store_id',
                    'active',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function test_list_active_products()
    {
        $this->get('api/products?active=1')
            ->assertOk()
            ->assertJsonFragment([
                'active' => 1,
            ]);
    }

    public function test_list_specific_product()
    {
        $this->get('api/products/2')
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'name',
                'price',
                'store_id',
                'active',
                'created_at',
                'updated_at',
            ]);
    }

    public function test_create_product()
    {
        $this->post('api/products', [
            'name' => 'Test Product',
            'price' => '10',
            'store_id' => 1,
            'active' => 1,
        ])
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'price',
                'store_id',
                'active',
                'created_at',
                'updated_at',
            ]);
    }

    public function test_update_product()
    {
        $this->put('api/products/2', [
            'name' => 'Test Product',
            'price' => '10',
            'store_id' => 1,
            'active' => true,
        ])
            ->assertOk();
    }

    public function test_delete_product()
    {
        $this->delete('api/products/6')
            ->assertStatus(204);
    }
}
