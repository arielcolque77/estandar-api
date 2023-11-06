<?php

namespace App\Modules\PaymentMethods\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\PaymentMethods\Repositories\PaymentMethodRepository;
use App\Modules\PaymentMethods\Requests\PaymentMethodStoreRequest;
use App\Modules\PaymentMethods\Requests\PaymentMethodUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PaymentMethodController extends Controller
{
    public function index(PaymentMethodRepository $modelRepository, Request $request)
    {
        return response()->json(
            $modelRepository->findAll($request)
        );
    }

    public function store(PaymentMethodStoreRequest $request, PaymentMethodRepository $modelRepository)
    {
        return response()->json(
            $modelRepository->create($request),
            Response::HTTP_OK
        );
    }

    public function show(PaymentMethodRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->find($id)
        );
    }

    public function update(PaymentMethodUpdateRequest $request, PaymentMethodRepository $modelRepository, $id)
    {
        return response()->json(
            $modelRepository->update($request, $id),
            Response::HTTP_OK
        );
    }

    public function delete(PaymentMethodRepository $modelRepository, $id)
    {
        $modelRepository->delete($id);
    }
}
