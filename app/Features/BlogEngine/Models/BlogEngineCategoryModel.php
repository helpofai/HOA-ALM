<?php

namespace App\Features\BlogEngine\Models;

use Illuminate\Database\Eloquent\Model;

class BlogEngineCategoryModel extends Model
{
    protected $table = 'blog_engine_categories';

    protected $fillable = ['name', 'slug', 'description'];

    public function posts()
    {
        return $this->belongsToMany(BlogEnginePostModel::class, 'blog_engine_post_category', 'category_id', 'post_id');
    }
}
