<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_list_stores()
    {
        $this->get('api/store')
            ->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function test_specify_store()
    {
        $this->get('api/store/1')
            ->assertOk()
            ->assertJson([
                'id' => 1,
                'name' => 'Solluti',
                'email' => 'solluti@company.com',
            ]);
    }

    public function test_create_store()
    {
        $this->post('api/store', [
            'name' => 'Test Store',
            'email' => 'email@test3.com',
        ])
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]);
    }

    public function test_update_store()
    {
        $this->put('api/store/10', [
            'name' => 'Test Store',
        ])
            ->assertOk();
    }

    public function test_delete_store()
    {
        $this->delete('api/store/10')
            ->assertStatus(204);
    }
}
