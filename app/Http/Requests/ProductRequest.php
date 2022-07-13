<?php

namespace App\Http\Requests;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match (true) {
            $this->getMethod() == 'POST' => [
                'name' => 'required|string|min:3|max:60',
                'price' => 'required|integer|min:99|max:999999',
                'store_id' => 'required|integer',
                'active' => 'required|boolean',
            ],

            $this->getMethod() == 'PUT' => [
                'name' => 'string|min:3|max:60',
                'price' => 'integer|min:99|max:999999',
                'store_id' => 'integer',
                'active' => 'boolean',
            ],
            default => []
        };
    }

    public function withValidator($validator)
    {
        $this->repository = app(ProductRepositoryInterface::class);

        if ($this->getMethod() == 'GET' || $this->getMethod() == 'PUT' || $this->getMethod() == 'DELETE') {
            if (isset($this->id)) {
                $validator->after(function ($validator) {
                    $result = $this->repository->findWhere('id', $this->id);

                    if ($result->count() == 0) {
                        $validator->errors()->add('id', 'O campo id selecionado é inválido.');
                    }
                });
            }
        }
    }
}
