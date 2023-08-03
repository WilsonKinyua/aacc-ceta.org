<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('public.index', compact('posts'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function organization()
    {
        return view('public.organization');
    }

    public function whatWeDo()
    {
        return view('public.what-we-do');
    }

    public function memberChurches()
    {
        return view('public.member-churches');
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('public.post', compact('post'));
    }
}
