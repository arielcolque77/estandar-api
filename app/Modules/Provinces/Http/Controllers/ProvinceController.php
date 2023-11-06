<?php

namespace App\Modules\Provinces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Provinces\Repositories\ProvinceRepository;
use App\Modules\Provinces\Requests\ProvinceStoreRequest;
use App\Modules\Provinces\Requests\ProvinceUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ProvinceController extends Controller
{
    public function index(ProvinceRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(ProvinceStoreRequest $request, ProvinceRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(ProvinceRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(ProvinceUpdateRequest $request, ProvinceRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(ProvinceRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
