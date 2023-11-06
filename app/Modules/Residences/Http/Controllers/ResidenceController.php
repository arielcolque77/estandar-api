<?php

namespace App\Modules\Residences\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Residences\Repositories\ResidenceRepository;
use App\Modules\Residences\Requests\ResidenceStoreRequest;
use App\Modules\Residences\Requests\ResidenceUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ResidenceController extends Controller
{
    public function index(ResidenceRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(ResidenceStoreRequest $request, ResidenceRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(ResidenceRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(ResidenceUpdateRequest $request, ResidenceRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(ResidenceRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
