<?php

namespace App\Modules\TsArgUsers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsArgUsers\Repositories\TsArgUserRepository;
use App\Modules\TsArgUsers\Requests\TsArgUserStoreRequest;
use App\Modules\TsArgUsers\Requests\TsArgUserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsArgUserController extends Controller
{
    public function index(TsArgUserRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsArgUserStoreRequest $request, TsArgUserRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsArgUserRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsArgUserUpdateRequest $request, TsArgUserRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsArgUserRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
