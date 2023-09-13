<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\MemberChurchCenter;
use App\Models\Post;
use App\Models\Statement;
use App\Models\Team;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $events = Event::orderBy("id","desc")->get();
        $posts = Post::latest()->get();
        return view('public.index', compact('posts', 'events'));
    }

    public function event($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('public.event', compact('event'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function organization()
    {
        $teams = Team::with(['media'])->get();
        return view('public.organization', compact('teams'));
    }

    public function organizationTeamDetails($slug)
    {
        $team = Team::where('slug', $slug)->firstOrFail();

        return view('public.organization-team-details', compact('team'));
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
        $categories = Category::with(['media'])->get();
        return view('public.gallery', compact('categories'));
    }

    public function galleryCategory($id)
    {
        $galleries = Gallery::whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->get();

        return view('public.gallery-list', compact('galleries'));
    }

    public function statements()
    {
        $statements = Statement::latest()->get();
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
