<?php

namespace App\Modules\TsUserStates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsUserStates\Repositories\TsUserStateRepository;
use App\Modules\TsUserStates\Requests\TsUserStateStoreRequest;
use App\Modules\TsUserStates\Requests\TsUserStateUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsUserStateController extends Controller
{
    public function index(TsUserStateRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsUserStateStoreRequest $request, TsUserStateRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsUserStateRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsUserStateUpdateRequest $request, TsUserStateRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsUserStateRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
