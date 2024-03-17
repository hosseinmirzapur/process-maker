<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Services\CardService;
use Illuminate\Http\JsonResponse;

class CardController extends Controller
{
    public function __construct(private readonly CardService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'cards' => $this->service->all()
        ]);
    }

    /**
     * @param CardRequest $request
     * @return JsonResponse
     */
    public function store(CardRequest $request): JsonResponse
    {
        return response()->json([
            'card' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'card' => $this->service->find($id)
        ]);
    }

    /**
     * @param CardRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CardRequest $request, $id): JsonResponse
    {
        return response()->json([
            'card' => $this->service->update($request->validated(), $id)
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
