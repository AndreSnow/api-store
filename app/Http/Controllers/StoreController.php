<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\StoreRepositoryInterface;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    protected $repository;

    public function __construct(StoreRepositoryInterface $repository)
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
        $store = $this->repository->getAll();

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
    public function show(StoreRequest $request)
    {
        $store = $this->repository->findById($request->id);

        return response()->json($store, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = $this->repository->store($request->validated());

        return response()->json($store, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $store = $this->repository->update($id, $request->validated());

        return response()->json($store, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreRequest $request)
    {
        $store = $this->repository->delete($request->id);

        return response()->json($store, 204);
    }
}
