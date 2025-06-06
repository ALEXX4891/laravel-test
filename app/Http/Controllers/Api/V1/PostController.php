<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Api\V1\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return PostResource::collection(Post::all());
        return PostResource::collection(Post::with('category')->paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // if ($post->id == 3) { // пост с id 3 не показываем
        //     return response()->json([
        //         'message' => 'Post with ID 3 is not allowed'
        //     ], 403);
        // }
        // return $post;
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        // return $post;
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Post id:' . $post->id . ' deleted!!!!',
            'status' => 200,
        ]);
    }
}
