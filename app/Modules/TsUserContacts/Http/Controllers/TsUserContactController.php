<?php

namespace App\Modules\TsUserContacts\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsUserContacts\Repositories\TsUserContactRepository;
use App\Modules\TsUserContacts\Requests\TsUserContactStoreRequest;
use App\Modules\TsUserContacts\Requests\TsUserContactUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsUserContactController extends Controller
{
    public function index(TsUserContactRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsUserContactStoreRequest $request, TsUserContactRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsUserContactRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsUserContactUpdateRequest $request, TsUserContactRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsUserContactRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
