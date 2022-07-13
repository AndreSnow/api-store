<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @group Produto
 * @testdox Gerenciamento de produtos
 * 
 * @author André Neves
 */
class ProductTest extends TestCase
{
    /**
     * Teste de listagem de produtos.
     * @group Listar
     * 
     * @author André Neves
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

    /**
     * Teste de listagem de produtos ativos.
     * @group Listar
     * 
     * @author André Neves
     */
    public function test_list_active_products()
    {
        $this->get('api/products?active=1')
            ->assertOk()
            ->assertJsonFragment([
                'active' => 1,
            ]);
    }

    /**
     * Teste de listagem de produtos especificos.
     * @group Listar
     * 
     * @author André Neves
     */
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

    /**
     * Teste de criação de um produto.
     * @group Criar
     * 
     * @author André Neves
     */
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

    /**
     * Teste de atualização de um produto.
     * @group Atualizar
     * 
     * @author André Neves
     */
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

    /**
     * Teste de exclusão de um produto.
     * @group Excluir
     * 
     * @author André Neves
     */
    public function test_delete_product()
    {
        $this->delete('api/products/3')
            ->assertStatus(204);
    }
}
