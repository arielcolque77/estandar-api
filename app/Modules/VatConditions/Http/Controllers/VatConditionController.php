<?php

namespace App\Modules\VatConditions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\VatConditions\Repositories\VatConditionRepository;
use App\Modules\VatConditions\Requests\VatConditionStoreRequest;
use App\Modules\VatConditions\Requests\VatConditionUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class VatConditionController extends Controller
{
    public function index(VatConditionRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(VatConditionStoreRequest $request, VatConditionRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(VatConditionRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(VatConditionUpdateRequest $request, VatConditionRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(VatConditionRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
