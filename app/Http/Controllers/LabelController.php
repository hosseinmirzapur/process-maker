<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Services\LabelService;
use Illuminate\Http\JsonResponse;

class LabelController extends Controller
{
    public function __construct(private readonly LabelService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'labels' => $this->service->all()
        ]);
    }

    /**
     * @param LabelRequest $request
     * @return JsonResponse
     */
    public function store(LabelRequest $request): JsonResponse
    {
        return response()->json([
            'label' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'label' => $this->service->find($id)
        ]);
    }

    /**
     * @param LabelRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(LabelRequest $request, $id): JsonResponse
    {
        return response()->json([
            'label' => $this->service->update($request->validated(), $id)
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
