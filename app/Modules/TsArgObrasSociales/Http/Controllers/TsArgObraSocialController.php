<?php

namespace App\Modules\TsArgObrasSociales\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsArgObrasSociales\Repositories\TsArgObraSocialRepository;
use App\Modules\TsArgObrasSociales\Requests\TsArgObraSocialStoreRequest;
use App\Modules\TsArgObrasSociales\Requests\TsArgObraSocialUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsArgObraSocialController extends Controller
{
    public function index(TsArgObraSocialRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsArgObraSocialStoreRequest $request, TsArgObraSocialRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsArgObraSocialRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsArgObraSocialUpdateRequest $request, TsArgObraSocialRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsArgObraSocialRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
