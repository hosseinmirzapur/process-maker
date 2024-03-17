<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'comments' => $this->service->all()
        ]);
    }

    /**
     * @param CommentRequest $request
     * @return JsonResponse
     */
    public function store(CommentRequest $request): JsonResponse
    {
        return response()->json([
            'comment' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'comment' => $this->service->find($id)
        ]);
    }

    /**
     * @param CommentRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CommentRequest $request, $id): JsonResponse
    {
        return response()->json([
            'comment' => $this->service->update($request->validated(), $id)
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'comment' => $this->service->delete($id)
        ]);
    }
}
