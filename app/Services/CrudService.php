<?php

namespace App\Services;

class CrudService
{
    public function getAll($model)
    {
        return $model::all();
    }

    public function create($model, $data)
    {
        return $model::create($data);
    }

    public function update($model, $id, $data)
    {
        $item = $model::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($model, $id)
    {
        return $model::destroy($id);
    }

}
