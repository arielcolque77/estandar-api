<?php

namespace App\Modules\TsArgMonotributoCategories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsArgMonotributoCategories\Repositories\TsArgMonotributoCategoryRepository;
use App\Modules\TsArgMonotributoCategories\Requests\TsArgMonotributoCategoryStoreRequest;
use App\Modules\TsArgMonotributoCategories\Requests\TsArgMonotributoCategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsArgMonotributoCategoryController extends Controller
{
    public function index(TsArgMonotributoCategoryRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsArgMonotributoCategoryStoreRequest $request, TsArgMonotributoCategoryRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsArgMonotributoCategoryRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsArgMonotributoCategoryUpdateRequest $request, TsArgMonotributoCategoryRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsArgMonotributoCategoryRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
