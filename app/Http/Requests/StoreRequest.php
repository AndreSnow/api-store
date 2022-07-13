<?php

namespace App\Http\Requests;

use App\Repositories\Contracts\StoreRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                'name' => 'required|string|min:3|max:40',
                'email' => 'required|string|email|max:255|unique:users',
            ],

            $this->getMethod() == 'PUT' => [
                'name' => 'string|min:3|max:40',
                'email' => 'string|email|max:255|unique:users',
            ],
            default => []
        };
    }

    public function withValidator($validator)
    {
        $this->repository = app(StoreRepositoryInterface::class);

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
