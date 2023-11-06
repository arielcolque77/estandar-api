<?php

namespace App\Modules\TsAbroadUserContacts\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsAbroadUserContacts\Repositories\TsAbroadUserContactRepository;
use App\Modules\TsAbroadUserContacts\Requests\TsAbroadUserContactStoreRequest;
use App\Modules\TsAbroadUserContacts\Requests\TsAbroadUserContactUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsAbroadUserContactController extends Controller
{
    public function index(TsAbroadUserContactRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsAbroadUserContactStoreRequest $request, TsAbroadUserContactRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsAbroadUserContactRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsAbroadUserContactUpdateRequest $request, TsAbroadUserContactRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsAbroadUserContactRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
