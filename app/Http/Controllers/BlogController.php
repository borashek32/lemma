<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Spatie\Tags\Tag;

class BlogController extends Controller
{
    public function blog()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/auto-magazine');
        }

        return view('blog.blog', compact( 'posts'));
    }

    public function onePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('blog.post-one', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('body', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/auto-magazine');
        }

        return view('blog.one-cat', compact('posts', 'category'));
    }

    public function tag($slug)
    {
        $tag = Tag::findFromStringOfAnyType($slug);

        $search = request()->query('search');
        if ($search) {
            $posts = Post::withAnyTags([$tag])
                ->where('body', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::withAnyTags([$tag])->latest()->paginate(6);
            $posts->withPath('/auto-magazine');
        }

        return view('blog.one-tag', compact('posts', 'tag'));
    }
}
