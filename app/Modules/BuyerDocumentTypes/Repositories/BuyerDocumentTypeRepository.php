<?php

namespace App\Modules\BuyerDocumentTypes\Repositories;

use App\Modules\BuyerDocumentTypes\Models\BuyerDocumentTypes;
use Illuminate\Http\Request;


class BuyerDocumentTypeRepository
{
    public function findAll(Request $request)
    {
        $rows = BuyerDocumentTypes
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', "%{$request->search}%");
            });
        }

        return
            $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            BuyerDocumentTypes::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): BuyerDocumentTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return BuyerDocumentTypes::create($modelData->all());
    }

    public function update($modelData, $id): BuyerDocumentTypes
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = BuyerDocumentTypes::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = BuyerDocumentTypes::find($id);
        if ($model) {
            if (auth()->check()) {
                $model->update(
                    [
                        'user_update_id' => auth()->user()->id,
                    ]
                );
            }
            $model->delete();
        }
        return $model;
    }
}
