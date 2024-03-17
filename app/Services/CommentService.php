<?php

namespace App\Services;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        $comments = Comment::all();
        return CommentResource::collection($comments);
    }

    /**
     * @param array $data
     * @return CommentResource
     */
    public function create(array $data): CommentResource
    {
        $comment = Comment::query()->create($data);
        return CommentResource::make($comment);
    }

    /**
     * @param $id
     * @return CommentResource
     */
    public function find($id): CommentResource
    {
        $comment = Comment::query()->findOrFail($id);
        return CommentResource::make($comment);
    }

    /**
     * @param array $data
     * @param $id
     * @return CommentResource
     */
    public function update(array $data, $id): CommentResource
    {
        $comment = Comment::query()->findOrFail($id);
        $comment->update($data);
        return CommentResource::make($comment);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $comment = Comment::query()->findOrFail($id);
        return $comment->delete();
    }
}
