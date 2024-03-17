<?php

namespace App\Services;

use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CardService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $cards = Card::with('labels')->get();
        return CardResource::collection($cards);
    }

    /**
     * @param array $data
     * @return CardResource
     */
    public function create(array $data): CardResource
    {
        $card = Card::query()->create($data);
        return CardResource::make($card);
    }

    /**
     * @param $id
     * @return CardResource
     */
    public function find($id): CardResource
    {
        $card = Card::query()->findOrFail($id);
        return CardResource::make($card);
    }

    /**
     * @param array $data
     * @param $id
     * @return CardResource
     */
    public function update(array $data, $id): CardResource
    {
        $card = Card::query()->findOrFail($id);
        $card->update($data);
        return CardResource::make($card);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $card = Card::query()->findOrFail($id);
        return $card->delete();
    }

    /**
     * @param $card_id
     * @param $label_id
     * @return CardResource
     */
    public function attachLabel($card_id, $label_id): CardResource
    {
        $card = Card::query()->findOrFail($card_id);
        $card->labels()->sync([$label_id], true);
        return CardResource::make($card);
    }
}
