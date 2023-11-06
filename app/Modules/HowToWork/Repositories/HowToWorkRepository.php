<?php

namespace App\Modules\HowToWork\Repositories;

use App\Modules\HowToWork\Models\HowToWork;
use Illuminate\Http\Request;


class HowToWorkRepository
{
    public function findAll(Request $request)
    {
        $rows = HowToWork
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
            HowToWork::with(
                'userCreate',
                'userUpdate',
            )
            ->find($id);
    }

    public function create($modelData): HowToWork
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return HowToWork::create($modelData->all());
    }

    public function update($modelData, $id): HowToWork
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = HowToWork::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = HowToWork::find($id);
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
