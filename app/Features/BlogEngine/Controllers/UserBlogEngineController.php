<?php

namespace App\Features\BlogEngine\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Features\BlogEngine\Models\BlogEnginePostModel;
use App\Features\BlogEngine\Models\BlogEngineCategoryModel;
use App\Features\BlogEngine\Models\BlogEngineTagModel;

class UserBlogEngineController extends Controller
{
    /**
     * Display a listing of blog posts for the user.
     */
    public function index()
    {
        $posts = BlogEnginePostModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('features.blog-engine.user.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $categories = BlogEngineCategoryModel::all();
        return view('features.blog-engine.user.create', compact('categories'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'category_id' => 'nullable|exists:blog_engine_categories,id',
            'tags' => 'nullable|string'
        ]);

        $slug = Str::slug($validated['title']) . '-' . Str::random(5);
        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog/images', 'public');
        }

        $post = BlogEnginePostModel::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? now() : null,
            'featured_image' => $imagePath,
            'meta_title' => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? $validated['excerpt'],
            'meta_keywords' => $validated['meta_keywords'],
        ]);

        // Handle Category
        if (!empty($validated['category_id'])) {
            $post->categories()->attach($validated['category_id']);
        }

        // Handle Tags (comma separated)
        if (!empty($validated['tags'])) {
            $tagNames = array_map('trim', explode(',', $validated['tags']));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (empty($tagName)) continue;
                $tag = BlogEngineTagModel::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('user.blog.index')->with('success', 'Blog post created successfully.');
    }
}
