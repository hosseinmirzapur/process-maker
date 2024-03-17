<?php

namespace App\Services;

use App\Http\Resources\ProcessResource;
use App\Models\Process;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProcessService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $processes = Process::with(['lists', 'members'])->get();
        return ProcessResource::collection($processes);
    }

    /**
     * @param array $data
     * @return ProcessResource
     */
    public function create(array $data): ProcessResource
    {
        $process = Process::query()->create($data);
        return ProcessResource::make($process);
    }

    /**
     * @param $id
     * @return ProcessResource
     */
    public function find($id): ProcessResource
    {
        $process = Process::query()->findOrFail($id);
        return ProcessResource::make($process);
    }

    /**
     * @param array $data
     * @param $id
     * @return ProcessResource
     */
    public function update(array $data, $id): ProcessResource
    {
        $process = Process::query()->findOrFail($id);
        $process->update($data);
        return ProcessResource::make($process);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        return Process::query()->findOrFail($id)->delete();
    }
}
