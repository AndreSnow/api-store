<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group Loja
 * @testdox Gerenciamento de lojas 
 * 
 * @author André Neves
 */
class StoreTest extends TestCase
{
    /**
     * Teste de listagem de lojas.
     * @group Listar
     * 
     * @author André Neves
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

    /**
     * Teste de listagem de uma loja especifica.
     * @group Listar
     * 
     * @author André Neves
     */
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

    /**
     * Teste de criação de uma loja.
     * @group Criar
     * 
     * @author André Neves
     */
    public function test_create_store()
    {
        $this->post('api/store', [
            'name' => 'Test Store',
            'email' => 'email@test.com',
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

    /**
     * Teste de atualização de uma loja.
     * @group Atualizar
     * 
     * @author André Neves
     */
    public function test_update_store()
    {
        $this->put('api/store/3', [
            'name' => 'Test Store',
        ])
            ->assertOk();
    }

    /**
     * Teste de exclusão de uma loja.
     * @group Excluir
     * 
     * Não use id = 1, pois essa loja é usada para testes e também a loja padrão.
     * @author André Neves
     */
    public function test_delete_store()
    {
        $this->delete('api/store/2')
            ->assertStatus(204);
    }
}
