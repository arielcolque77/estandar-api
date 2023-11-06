<?php

namespace App\Modules\TsUserContactTypes\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsUserContactTypes\Repositories\TsUserContactTypeRepository;
use App\Modules\TsUserContactTypes\Requests\TsUserContactTypeStoreRequest;
use App\Modules\TsUserContactTypes\Requests\TsUserContactTypeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsUserContactTypeController extends Controller
{
    public function index(TsUserContactTypeRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsUserContactTypeStoreRequest $request, TsUserContactTypeRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsUserContactTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsUserContactTypeUpdateRequest $request, TsUserContactTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsUserContactTypeRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
