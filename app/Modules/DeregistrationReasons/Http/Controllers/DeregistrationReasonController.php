<?php

namespace App\Modules\DeregistrationReasons\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\DeregistrationReasons\Repositories\DeregistrationReasonRepository;
use App\Modules\DeregistrationReasons\Requests\DeregistrationReasonStoreRequest;
use App\Modules\DeregistrationReasons\Requests\DeregistrationReasonUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class DeregistrationReasonController extends Controller
{
    public function index(DeregistrationReasonRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(DeregistrationReasonStoreRequest $request, DeregistrationReasonRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(DeregistrationReasonRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(DeregistrationReasonUpdateRequest $request, DeregistrationReasonRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(DeregistrationReasonRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
