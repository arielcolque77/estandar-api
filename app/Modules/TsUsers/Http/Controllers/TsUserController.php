<?php

namespace App\Modules\TsUsers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsUsers\Repositories\TsUserRepository;
use App\Modules\TsUsers\Requests\TsUserStoreRequest;
use App\Modules\TsUsers\Requests\TsUserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsUserController extends Controller
{
    public function index(TsUserRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsUserStoreRequest $request, TsUserRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsUserRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsUserUpdateRequest $request, TsUserRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsUserRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
