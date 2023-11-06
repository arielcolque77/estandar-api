<?php

namespace App\Modules\TsArgMonotributos\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsArgMonotributos\Repositories\TsArgMonotributoRepository;
use App\Modules\TsArgMonotributos\Requests\TsArgMonotributoStoreRequest;
use App\Modules\TsArgMonotributos\Requests\TsArgMonotributoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsArgMonotributoController extends Controller
{
    public function index(TsArgMonotributoRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsArgMonotributoStoreRequest $request, TsArgMonotributoRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsArgMonotributoRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsArgMonotributoUpdateRequest $request, TsArgMonotributoRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsArgMonotributoRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
