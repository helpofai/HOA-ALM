<?php

namespace App\Features\BlogEngine\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BlogEnginePostModel extends Model
{
    protected $table = 'blog_engine_posts';

    protected $fillable = [
        'user_id', 'title', 'slug', 'excerpt', 'content', 'status', 'published_at',
        'featured_image', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BlogEngineCategoryModel::class, 'blog_engine_post_category', 'post_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogEngineTagModel::class, 'blog_engine_post_tag', 'post_id', 'tag_id');
    }
}
