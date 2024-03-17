<?php

namespace App\Services;

use App\Http\Resources\LabelResource;
use App\Models\Label;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LabelService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $labels = Label::with('action')->get();
        return LabelResource::collection($labels);
    }

    /**
     * @param array $data
     * @return LabelResource
     */
    public function create(array $data): LabelResource
    {
        $label = Label::query()->create($data);
        return LabelResource::make($label);
    }

    /**
     * @param $id
     * @return LabelResource
     */
    public function find($id): LabelResource
    {
        $label = Label::query()->findOrFail($id);
        return LabelResource::make($label);
    }

    /**
     * @param array $data
     * @param $id
     * @return LabelResource
     */
    public function update(array $data, $id): LabelResource
    {
        $label = Label::query()->findOrFail($id);
        $label->update($data);
        return LabelResource::make($label);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $label = Label::query()->findOrFail($id);
        return $label->delete();
    }
}
