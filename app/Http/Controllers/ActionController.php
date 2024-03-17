<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest;
use App\Services\ActionService;
use Illuminate\Http\JsonResponse;

class ActionController extends Controller
{
    public function __construct(private readonly ActionService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'actions' => $this->service->all()
        ]);
    }

    /**
     * @param ActionRequest $request
     * @return JsonResponse
     */
    public function store(ActionRequest $request): JsonResponse
    {
        return response()->json([
            'action' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'action' => $this->service->find($id)
        ]);
    }

    /**
     * @param ActionRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ActionRequest $request, $id): JsonResponse
    {
        return response()->json([
            'action' => $this->service->update($request->validated(), $id)
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
