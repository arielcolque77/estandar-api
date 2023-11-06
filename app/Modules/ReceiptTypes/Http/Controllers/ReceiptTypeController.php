<?php

namespace App\Modules\ReceiptTypes\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ReceiptTypes\Repositories\ReceiptTypeRepository;
use App\Modules\ReceiptTypes\Requests\ReceiptTypeStoreRequest;
use App\Modules\ReceiptTypes\Requests\ReceiptTypeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ReceiptTypeController extends Controller
{
    public function index(ReceiptTypeRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(ReceiptTypeStoreRequest $request, ReceiptTypeRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(ReceiptTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(ReceiptTypeUpdateRequest $request, ReceiptTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(ReceiptTypeRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
