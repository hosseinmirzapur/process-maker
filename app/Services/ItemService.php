<?php

namespace App\Services;

use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemService
{
    public function all()
    {
        $items = Item::all();
        return ItemResource::collection($items);
    }

    public function create(array $data)
    {
        $item = Item::query()->create($data);
        return ItemResource::make($item);
    }

    public function find($id)
    {
        $item = Item::query()->findOrFail($id);
        return ItemResource::make($item);
    }

    public function update(array $data, $id)
    {
        $item = Item::query()->findOrFail($id);
        $item->update($data);
        return ItemResource::make($item);
    }

    public function delete($id)
    {
        return Item::query()->findOrFail($id)->delete();
    }
}
