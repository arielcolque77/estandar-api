<?php

namespace App\Modules\Countries\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Countries\Repositories\CountryRepository;
use App\Modules\Countries\Requests\CountryStoreRequest;
use App\Modules\Countries\Requests\CountryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CountryController extends Controller
{
    public function index(CountryRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(CountryStoreRequest $request, CountryRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(CountryRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(CountryUpdateRequest $request, CountryRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(CountryRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
