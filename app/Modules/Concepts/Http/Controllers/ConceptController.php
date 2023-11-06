<?php

namespace App\Modules\Concepts\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Concepts\Repositories\ConceptRepository;
use App\Modules\Concepts\Requests\ConceptStoreRequest;
use App\Modules\Concepts\Requests\ConceptUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ConceptController extends Controller
{
    public function index(ConceptRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(ConceptStoreRequest $request, ConceptRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(ConceptRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(ConceptUpdateRequest $request, ConceptRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(ConceptRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
