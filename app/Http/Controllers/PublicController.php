<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\MemberChurchCenter;
use App\Models\Post;
use App\Models\Statement;
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

    public function posts()
    {
        $posts = Post::all();
        return view('public.posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('public.post', compact('post'));
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        return view('public.gallery', compact('gallery'));
    }

    public function statements()
    {
        $statements = Statement::all();
        return view('public.statements', compact('statements'));
    }

    public function careers()
    {
        $careers = Career::all();
        return view('public.careers', compact('careers'));
    }

    public function contacts()
    {
        return view('public.contacts');
    }

    public function contactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts',
            "subject" => "required",
            "phone" => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            "subject" => $request->subject,
            "phone" => $request->phone,
            'message' => $request->message
        ];

        Contact::create($data);

        return redirect()->back()->with('message', 'Message sent successfully. We will get back to you soon.');
    }
}
