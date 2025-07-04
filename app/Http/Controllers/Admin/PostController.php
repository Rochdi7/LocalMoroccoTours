<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'nullable|exists:blog_categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
        ]);

        // Generate unique slug
        $slug = Str::slug($request->title);
        $existingSlug = Post::where('slug', $slug)->first();

        if ($existingSlug) {
            // If the slug already exists, append a unique number
            $slug = $this->generateUniqueSlug($slug);
        }

        // Create the post
        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        // Handle file upload for featured image
        if ($request->hasFile('featured_image')) {
            $post->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }

        // Attach tags if any
        if ($request->filled('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'nullable|exists:blog_categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'published_at' => $request->status === 'published' && $post->published_at === null
                ? now()
                : $post->published_at,
        ]);

        // Update featured image
        if ($request->hasFile('featured_image')) {
            $post->clearMediaCollection('featured_image');
            $post->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }

        // Sync tags
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->clearMediaCollection('featured_image');
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted.');
    }

    // Helper function to generate unique slug
    private function generateUniqueSlug($slug)
    {
        $count = 1;
        $newSlug = $slug . '-' . $count;

        // Keep incrementing the number until a unique slug is found
        while (Post::where('slug', $newSlug)->exists()) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
}
