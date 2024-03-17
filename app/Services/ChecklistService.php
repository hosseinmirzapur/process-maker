<?php

namespace App\Services;

use App\Http\Resources\ChecklistResource;
use App\Models\Checklist;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChecklistService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $checklists = Checklist::with('items')->get();
        return ChecklistResource::collection($checklists);
    }

    /**
     * @param array $data
     * @return ChecklistResource
     */
    public function create(array $data): ChecklistResource
    {
        $checklist = Checklist::query()->create($data);
        return ChecklistResource::make($checklist);
    }

    /**
     * @param $id
     * @return ChecklistResource
     */
    public function find($id): ChecklistResource
    {
        $checklist = Checklist::query()->findOrFail($id);
        return ChecklistResource::make($checklist);
    }

    /**
     * @param array $data
     * @param $id
     * @return ChecklistResource
     */
    public function update(array $data, $id): ChecklistResource
    {
        $checklist = Checklist::query()->findOrFail($id);
        $checklist->update($data);
        return ChecklistResource::make($checklist);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $checklist = Checklist::query()->findOrFail($id);
        return $checklist->delete();
    }
}
