<?php

namespace App\Services;

use App\Http\Resources\ListObjectResource;
use App\Models\ListObject;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListObjectService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $lists = ListObject::with('cards')->get();
        return ListObjectResource::collection($lists);
    }

    /**
     * @param array $data
     * @return ListObjectResource
     */
    public function create(array $data): ListObjectResource
    {
        $list = ListObject::query()->create($data);
        return ListObjectResource::make($list);
    }

    /**
     * @param $id
     * @return ListObjectResource
     */
    public function find($id): ListObjectResource
    {
        $list = ListObject::query()->findOrFail($id);
        return ListObjectResource::make($list);
    }


    /**
     * @param array $data
     * @param $id
     * @return ListObjectResource
     */
    public function update(array $data, $id): ListObjectResource
    {
        $list = ListObject::query()->findOrFail($id);
        $list->update($data);
        return ListObjectResource::make($list);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $list = ListObject::query()->findOrFail($id);
        return $list->delete();
    }
}
