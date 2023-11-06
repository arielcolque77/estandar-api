<?php

namespace App\Modules\TsArgObrasSociales\Repositories;

use App\Modules\TsArgObrasSociales\Models\TsArgObrasSociales;
use Illuminate\Http\Request;


class TsArgObraSocialRepository
{
    public function findAll(Request $request)
    {
        $rows = TsArgObrasSociales
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', "%{$request->search}%")
                    ->orWhere('code', 'like', "%{$request->search}%")
                    ->orWhere('enabled', 'like', "%{$request->search}%")
                    ->orWhere('acronyms', 'like', "%{$request->search}%");
            });
        }

        $rows = $rows->orderBy('name', 'ASC');

        return
            $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsArgObrasSociales::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): TsArgObrasSociales
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsArgObrasSociales::create($modelData->all());
    }

    public function update($modelData, $id): TsArgObrasSociales
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsArgObrasSociales::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsArgObrasSociales::find($id);
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
