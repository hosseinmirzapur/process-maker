<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChecklistRequest;
use App\Services\ChecklistService;
use Illuminate\Http\JsonResponse;

class ChecklistController extends Controller
{
    public function __construct(private readonly ChecklistService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'checklists' => $this->service->all()
        ]);
    }

    /**
     * @param ChecklistRequest $request
     * @return JsonResponse
     */
    public function store(ChecklistRequest $request): JsonResponse
    {
        return response()->json([
            'checklist' => $this->service->create($request->validated())
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'checklist' => $this->service->find($id)
        ]);
    }

    /**
     * @param ChecklistRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ChecklistRequest $request, $id): JsonResponse
    {
        return response()->json([
            'checklist' => $this->service->update($request->validated(), $id)
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
