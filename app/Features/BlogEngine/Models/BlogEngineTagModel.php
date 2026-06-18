<?php

namespace App\Features\BlogEngine\Models;

use Illuminate\Database\Eloquent\Model;

class BlogEngineTagModel extends Model
{
    protected $table = 'blog_engine_tags';

    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(BlogEnginePostModel::class, 'blog_engine_post_tag', 'tag_id', 'post_id');
    }
}
