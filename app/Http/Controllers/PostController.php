<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->latest('published_at')
            ->paginate(6);

        $categories = BlogCategory::all();
        $tags = Tag::all();
        $recentPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('front.blog.post', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();

        $posts = Post::where('status', 'published')
            ->where('category_id', $category->id)
            ->latest('published_at')
            ->paginate(6);

        $categories = BlogCategory::all();
        $tags = Tag::all();
        $recentPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('front.blog.post', compact(
            'posts',
            'categories',
            'tags',
            'recentPosts',
            'category'
        ));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = Post::where('status', 'published')
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            })
            ->latest('published_at')
            ->paginate(6);

        $categories = BlogCategory::all();
        $tags = Tag::all();
        $recentPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('front.blog.post', compact(
            'posts',
            'categories',
            'tags',
            'recentPosts',
            'tag'
        ));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $previousPost = Post::where('status', 'published')
            ->where('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextPost = Post::where('status', 'published')
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $overallRatings = collect(); // empty if ratings removed

        $reviews = Review::where('reviewable_type', Post::class)
            ->where('reviewable_id', $post->id)
            ->latest()
            ->get()
            ->map(function ($review) {
                return (object)[
                    'id' => $review->id,
                    'name' => $review->name,
                    'email' => $review->email,
                    'title' => $review->title,
                    'comment' => $review->comment,
                    'images' => collect($review->images)->map(
                        fn($path) => asset('storage/' . $path)
                    )->toArray(),
                    'date' => $review->created_at->format('F Y'),
                    'avatar' => asset('img/reviews/avatars/1.png'),
                    'rating' => $review->rating,
                    'helpful_count' => $review->helpful_count ?? 0,
                    'not_helpful_count' => $review->not_helpful_count ?? 0,
                ];
            });

        return view('front.blog.post-details', compact(
            'post',
            'overallRatings',
            'reviews',
            'previousPost',
            'nextPost'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::where('status', 'published')
            ->where(function ($q2) use ($query) {
                $q2->where('title', 'LIKE', '%' . $query . '%')
                    ->orWhere('excerpt', 'LIKE', '%' . $query . '%')
                    ->orWhere('content', 'LIKE', '%' . $query . '%');
            })
            ->latest('published_at')
            ->paginate(6);

        $categories = BlogCategory::all();
        $tags = Tag::all();
        $recentPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('front.blog.post', compact(
            'posts',
            'categories',
            'tags',
            'recentPosts',
            'query'
        ));
    }

    public function leaveReview(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'comment' => 'required|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        DB::transaction(function () use ($validated, $request, $post) {
            $review = new Review([
                'reviewable_type' => Post::class,
                'reviewable_id' => $post->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
                'rating' => 5, // Default or null if not needed
            ]);

            if ($request->hasFile('images')) {
                $paths = [];
                foreach ($request->file('images') as $image) {
                    $paths[] = $image->store('reviews', 'public');
                }
                $review->images = $paths;
            }

            $review->save();
        });

        return back()->with('success', [
            'message' => 'Your review has been submitted!',
            'context' => 'review',
        ]);
    }
}
