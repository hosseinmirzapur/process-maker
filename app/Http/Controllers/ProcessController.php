<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Services\ProcessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function __construct(private readonly ProcessService $service)
    {

    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'processes' => $this->service->all()
        ]);
    }

    /**
     * @param ProcessRequest $request
     * @return JsonResponse
     */
    public function store(ProcessRequest $request): JsonResponse
    {
        $data = $request->validated();
        return response()->json([
            'process' => $this->service->create($data)
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'process' => $this->service->find($id)
        ]);
    }

    /**
     * @param ProcessRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ProcessRequest $request, $id): JsonResponse
    {
        return response()->json([
            'process' => $this->service->update($request->validated(), $id)
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
