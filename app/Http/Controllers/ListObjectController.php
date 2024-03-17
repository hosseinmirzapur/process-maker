<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListObjectRequest;
use App\Services\ListObjectService;
use Illuminate\Http\JsonResponse;

class ListObjectController extends Controller
{
    public function __construct(private readonly ListObjectService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'lists' => $this->service->all()
        ]);
    }

    /**
     * @param ListObjectRequest $request
     * @return JsonResponse
     */
    public function store(ListObjectRequest $request): JsonResponse
    {
        return response()->json([
            'list' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'list' => $this->service->find($id)
        ]);
    }

    /**
     * @param ListObjectRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ListObjectRequest $request, $id): JsonResponse
    {
        return response()->json([
            'list' => $this->service->update($request->validated(), $id)
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
