<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->repository->getAll();

        if ($product) {
            return response()->json($product, 200);
        }
        return response()->json(['message' => 'Nada encontrado!'], 204);
    }

    /**
     * Display a listing of the resource actives.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $store = $this->repository->findWhere('active', 1);

        if ($store) {
            return response()->json($store, 200);
        }
        return response()->json(['message' => 'Nada encontrado!'], 204);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRequest $request)
    {
        $product = $this->repository->findById($request->id);

        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->repository->store($request->validated());

        return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->repository->update($id, $request->validated());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $request)
    {
        $product = $this->repository->delete($request->id);

        return response()->json($product, 204);
    }
}
