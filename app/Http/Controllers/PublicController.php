<?php

namespace App\Http\Controllers;

use App\Models\MemberChurchCenter;
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
        $memberChurches = MemberChurchCenter::all();
        return view('public.member-churches', compact('memberChurches'));
    }

    public function memberChurch($slug)
    {
        $memberChurch = MemberChurchCenter::where('slug', $slug)->firstOrFail();
        return view('public.member-church', compact('memberChurch'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('public.post', compact('post'));
    }
}
