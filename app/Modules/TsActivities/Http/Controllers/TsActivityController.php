<?php

namespace App\Modules\TsActivities\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TsActivities\Repositories\TsActivityRepository;
use App\Modules\TsActivities\Requests\TsActivityStoreRequest;
use App\Modules\TsActivities\Requests\TsActivityUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TsActivityController extends Controller
{
    public function index(TsActivityRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(TsActivityStoreRequest $request, TsActivityRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(TsActivityRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(TsActivityUpdateRequest $request, TsActivityRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(TsActivityRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
