<?php

namespace App\Modules\Concepts\Repositories;

use App\Modules\Concepts\Models\Concepts;
use Illuminate\Http\Request;


class ConceptRepository
{
    public function findAll(Request $request)
    {
        $rows = Concepts
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
            Concepts::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): Concepts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return Concepts::create($modelData->all());
    }

    public function update($modelData, $id): Concepts
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = Concepts::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = Concepts::find($id);
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
