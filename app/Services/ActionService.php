<?php

namespace App\Services;

use App\Http\Resources\ActionResource;
use App\Models\Action;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActionService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $actions = Action::all();
        return ActionResource::collection($actions);
    }

    /**
     * @param array $data
     * @return ActionResource
     */
    public function create(array $data): ActionResource
    {
        $action = Action::query()->create($data);
        return ActionResource::make($action);
    }

    /**
     * @param $id
     * @return ActionResource
     */
    public function find($id): ActionResource
    {
        $action = Action::query()->findOrFail($id);
        return ActionResource::make($action);
    }

    /**
     * @param array $data
     * @param $id
     * @return ActionResource
     */
    public function update(array $data, $id): ActionResource
    {
        $action = Action::query()->findOrFail($id);
        $action->update($data);
        return ActionResource::make($action);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $action = Action::query()->findOrFail($id);
        return $action->delete();
    }
}
