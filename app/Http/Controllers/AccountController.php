<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\ChangeAccountPassRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{

    public function __construct(private readonly AccountService $service)
    {

    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'accounts' => $this->service->all()
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'account' => $this->service->find($id)
        ]);
    }

    /**
     * @param AccountRequest $request
     * @return JsonResponse
     */
    public function store(AccountRequest $request): JsonResponse
    {
        return response()->json([
            'account' => $this->service->create($request->validated())
        ]);
    }

    /**
     * @param AccountRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(AccountRequest $request, $id): JsonResponse
    {
        return response()->json([
            'account' => $this->service->update($request->validated(), $id)
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

    /**
     * @param ChangeAccountPassRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function changePass(ChangeAccountPassRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        return response()->json([
            'success' => $this->service->changePass($id, $data['old'], $data['new'], $data['confirm'])
        ]);
    }
}
