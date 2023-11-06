<?php

namespace App\Modules\Receipts\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Receipts\Repositories\ReceiptRepository;
use App\Modules\Receipts\Requests\ReceiptStoreRequest;
use App\Modules\Receipts\Requests\ReceiptUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ReceiptController extends Controller
{
    public function index(ReceiptRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(ReceiptStoreRequest $request, ReceiptRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(ReceiptRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(ReceiptUpdateRequest $request, ReceiptRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(ReceiptRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
