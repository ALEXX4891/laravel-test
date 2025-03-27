<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'content' => $this->content,
            'content' => $this->when(Route::currentRouteName() == 'posts.show', $this->content),
            'category_name' => $this->category->title, // связка категории и поста
            // 'image' => $this->image,
            // 'image_url' => asset('storage/'. $this->image),  // generate image url using Laravel's asset helper function
            // 'views' => $this->views,
            // 'is_published' => $this->is_published,
            // 'published_at' => $this->published_at? $this->published_at->format('Y-m-d H:i:s') : null,
            // 'slug' => $this->slug,
            // 'meta_title' => $this->meta_title,
            // 'meta_description' => $this->meta_description,
            // 'meta_keywords' => $this->meta_keywords,
            // 'category_id' => $this->category_id,
            // 'category' => new CategoryResource($this->category),  // eager loading category info
            // 'user_id' => $this->user_id,
            // 'user' => new UserResource($this->user),  // eager loading user info
            // 'category' => new CategoryResource($this->category),  // eager loading category info
            // 'comments' => CommentResource::collection($this->comments),  // eager loading comments info
            // 'comments_count' => $this->comments->count(),  // eager loading comments count
            // 'tags' => TagResource::collection($this->tags),  // eager loading tags info
            // 'tags_count' => $this->tags->count(),  // eager loading tags count
            // 'likes' => LikeResource::collection($this->likes),  // eager loading likes info
            // 'likes_count' => $this->likes->count(),  // eager loading likes count

            'category_id' => $this->category_id,
            'created' => $this->created_at->format('Y-m-d H:i:s'),
            'updated' => $this->updated_at->format('Y-m-d H:i:s'),


        ];
    }
}
