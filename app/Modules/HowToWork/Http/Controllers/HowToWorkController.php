<?php

namespace App\Modules\HowToWork\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\HowToWork\Repositories\HowToWorkRepository;
use App\Modules\HowToWork\Requests\HowToWorkStoreRequest;
use App\Modules\HowToWork\Requests\HowToWorkUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HowToWorkController extends Controller
{
    public function index(HowToWorkRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(HowToWorkStoreRequest $request, HowToWorkRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(HowToWorkRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(HowToWorkUpdateRequest $request, HowToWorkRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(HowToWorkRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
