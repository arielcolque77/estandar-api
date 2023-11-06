<?php

namespace App\Modules\TsActivities\Repositories;

use App\Modules\TsActivities\Models\TsActivities;
use Illuminate\Http\Request;


class TsActivityRepository
{
    public function findAll(Request $request)
    {
        $rows = TsActivities
            ::select()
            ->with(
                'userCreate',
                'userUpdate',
            );

        if ($request->search) {
            $rows = $rows->where(function ($subQuery) use ($request) {
                $subQuery->where('description', 'like', "%{$request->search}%")
                    ->orWhere('afip_activity', 'like', "%{$request->search}%")
                    ->orWhere('afip_code', 'like', "%{$request->search}%")
                    ->orWhere('rubro', 'like', "%{$request->search}%");
            });
        }

        $rows = $rows->orderBy("description", "ASC");

        return $request->per_page ? $rows->paginate($request->per_page) : $rows->get();
    }

    public function find($id)
    {
        return
            TsActivities::with(
                'userCreate',
                'userUpdate',
            )->find($id);
    }

    public function create($modelData): TsActivities
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_create_id' => auth()->user()->id,
                ]
            );
        }

        return TsActivities::create($modelData->all());
    }

    public function update($modelData, $id): TsActivities
    {
        if (auth()->check()) {
            $modelData->merge(
                [
                    'user_update_id' => auth()->user()->id,
                ]
            );
        }

        $model = TsActivities::find($id);
        $model->update($modelData->all());

        return $model;
    }

    public function delete($id)
    {
        $model = TsActivities::find($id);
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
