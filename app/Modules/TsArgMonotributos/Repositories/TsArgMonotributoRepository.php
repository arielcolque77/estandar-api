<?php

namespace App\Modules\TsArgMonotributos\Repositories;

use App\Modules\TsArgMonotributos\Models\TsArgMonotributos;
use Illuminate\Http\Request;


class TsArgMonotributoRepository
{
    public function findAll(Request $request)
    {
        $rows = TsArgMonotributos
            ::select()
            ->with(
                'obraSocial',
                'monotributoCategory',
                'residence',
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('cuit', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%")
                    ->orWhereHas('monotributoCategory', function ($query) use ($request) {
                        $query->where('letter', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->monotributoCategory) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('monotributo_category_id', 'like', "%{$request->monotributoCategory}%");
            });
        }

        if ($request->active) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('active', 'like', "%{$request->active}%");
            });
        }

        if ($request->approved) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('approved', 'like', "%{$request->approved}%");
            });
        }

        if ($request->automatic_debit) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('automatic_debit', 'like', "%{$request->automatic_debit}%");
            });
        }

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsArgMonotributos::with(
                'obraSocial',
                'monotributoCategory',
                'residence',
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsArgMonotributos
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsArgMonotributos::create($modelData->all());
    }

    public function update($modelData, $id): TsArgMonotributos
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsArgMonotributos::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsArgMonotributos::find($id);
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
