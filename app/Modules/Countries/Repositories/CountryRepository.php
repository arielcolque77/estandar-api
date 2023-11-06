<?php

namespace App\Modules\Countries\Repositories;

use App\Modules\Countries\Models\Countries;
use Illuminate\Http\Request;


class CountryRepository
{
    public function findAll(Request $request)
    {
        $rows = Countries
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', "%{$request->search}%")
                    ->orWhere('country_code', 'like', "%{$request->search}%");
            });
        }

        $rows = $rows->orderBy('name', 'ASC');

        return
            $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            Countries::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): Countries
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return Countries::create($modelData->all());
    }

    public function update($modelData, $id): Countries
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = Countries::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = Countries::find($id);
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
