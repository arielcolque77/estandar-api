<?php

namespace App\Modules\BuyerDocumentTypes\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BuyerDocumentTypes\Repositories\BuyerDocumentTypeRepository;
use App\Modules\BuyerDocumentTypes\Requests\BuyerDocumentTypeStoreRequest;
use App\Modules\BuyerDocumentTypes\Requests\BuyerDocumentTypeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BuyerDocumentTypeController extends Controller
{
    public function index(BuyerDocumentTypeRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(BuyerDocumentTypeStoreRequest $request, BuyerDocumentTypeRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(BuyerDocumentTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(BuyerDocumentTypeUpdateRequest $request, BuyerDocumentTypeRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(BuyerDocumentTypeRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
