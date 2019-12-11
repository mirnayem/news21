<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $posts = Post::latest()->take(5)->get();
        $f_popularpost = Post::orderBy('views', 'desc')->take(1)->get();
        $s_popularpost = Post::orderBy('views', 'desc')->skip(1)->take(2)->get();
        $popularpost = Post::orderBy('views', 'desc')->take(5)->get();
        $breaking = Post::where('is_breaking', 1)->latest()->take(1)->get();
        $relevant = Post::where('is_relevant', 1)->latest()->take(3)->get();
        $f_editor_pick = Post::where('is_editor', 1)->latest()->take(1)->get();
        $editor_pick = Post::where('is_editor', 1)->latest()->skip(1)->take(3)->get();
        $all_category = Category::with('posts')->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month ')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month ')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
        return view('pages.index', compact('all_category', 'posts', 'tags', 'f_popularpost', 's_popularpost', 'popularpost', 'breaking', 'relevant', 'f_editor_pick', 'editor_pick', 'archives'));
    }


    public function contact()
    {
        $all_category = Category::all();
        return view('pages.contact', compact('all_category'));
    }



    public function contact_with_data(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required | min: 4',
            'message' => 'required | min:10'
        ]);

        $data = [
            'from' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'messages' => $request->message,
        ];

        Mail::send('mail.contact', $data, function ($info) use ($data) {

            $info->from($data['email']);
            $info->to('mirnayem49@gmail.com');
            $info->subject($data['subject']);
        });

        Session::flash('success', 'Your email has sent successfully');

        return redirect('/contact');
    }

    public function about_us()
    {
        $all_category = Category::all();

        return view('pages.about', compact('all_category'));
    }
}
