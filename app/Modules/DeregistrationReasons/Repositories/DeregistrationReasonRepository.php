<?php

namespace App\Modules\DeregistrationReasons\Repositories;

use App\Modules\DeregistrationReasons\Models\DeregistrationReasons;
use Illuminate\Http\Request;


class DeregistrationReasonRepository
{
    public function findAll(Request $request)
    {
        $rows = DeregistrationReasons
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
            DeregistrationReasons::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): DeregistrationReasons
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return DeregistrationReasons::create($modelData->all());
    }

    public function update($modelData, $id): DeregistrationReasons
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = DeregistrationReasons::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = DeregistrationReasons::find($id);
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
