<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //

    protected $fillable = ['title', 'content', 'category_id']; // разрешим массовое заполнение указанных полей

    // protected $hidden = ['updated_at', 'created_at']; // скроет поля

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class); // связь с моделью Category
    }
}
