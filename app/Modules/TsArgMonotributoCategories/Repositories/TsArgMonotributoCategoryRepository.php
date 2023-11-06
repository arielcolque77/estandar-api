<?php

namespace App\Modules\TsArgMonotributoCategories\Repositories;

use App\Modules\TsArgMonotributoCategories\Models\TsArgMonotributoCategories;
use Illuminate\Http\Request;


class TsArgMonotributoCategoryRepository
{
    public function findAll(Request $request)
    {
        $rows = TsArgMonotributoCategories
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('letter', 'like', "%{$request->search}%");
            });
        }

        // $rows = $rows->orderBy("letter", "ASC"); evaluate

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsArgMonotributoCategories::with(
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsArgMonotributoCategories
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsArgMonotributoCategories::create($modelData->all());
    }

    public function update($modelData, $id): TsArgMonotributoCategories
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsArgMonotributoCategories::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsArgMonotributoCategories::find($id);
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
