<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    public function __construct(private readonly ItemService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'items' => $this->service->all()
        ]);
    }

    /**
     * @param ItemRequest $request
     * @return JsonResponse
     */
    public function store(ItemRequest $request): JsonResponse
    {
        return response()->json([
            'item' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'item' => $this->service->find($id)
        ]);
    }

    /**
     * @param ItemRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ItemRequest $request, $id): JsonResponse
    {
        return response()->json([
            'item' => $this->service->update($request->validated(), $id)
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'success' => $this->service->delete($id)
        ]);
    }
}
