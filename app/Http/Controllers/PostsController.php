<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\PostImage;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $all_category = Category::all();
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags', 'all_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(request(), [
            'title'    => 'required',
            'body'    => 'required',
            'category_id'  => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->category_id = $request->category_id;
        $post->is_relevant = $request->is_relevant;
        $post->is_breaking = $request->is_breaking;
        $post->is_editor = $request->is_editor;
        $post->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $destinationPath = 'post_images/';
                $filename = time() . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);

                $image = new PostImage([
                    'path' => $filename,
                ]);

                $post->images()->save($image);
            }
        }









        $post->tags()->sync($request->tags, false);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);
        $comments = $post->comments()->get();
        $tags = Tag::all();
        $all_category = Category::with('posts')->get();
        $post->increment('views');
        $postsviews = Post::orderBy('views', 'desc')->take(4)->get();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        $popularpost = Post::orderBy('views', 'desc')->take(5)->get();
        $f_editor_pick = Post::where('is_editor', 1)->latest()->take(1)->get();
        $editor_pick = Post::where('is_editor', 1)->latest()->skip(1)->take(3)->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month ')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
        return view('admin.posts.show', compact('post', 'archives', 'all_category', 'postsviews', 'tags', 'comments', 'previous', 'next', 'popularpost', 'f_editor_pick', 'editor_pick'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $tags = Tag::pluck('name', 'id')->all();
        $all_category = Category::all();
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'all_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title'    => 'required',
            'body'    => 'required',
            'category_id'  => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->category_id = $request->category_id;
        $post->is_relevant = $request->is_relevant;
        $post->is_breaking = $request->is_breaking;
        $post->is_editor = $request->is_editor;
        $post->save();
        $post->tags()->sync($request->tags);



        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $image) {
                $destinationPath = 'post_images/';
                $filename = time() . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);

                $image = new PostImage([
                    'path' => $filename,
                ]);

                $post->images()->save($image);
            }
        }
        foreach ($post->images as $image) {
            $post->images()->sync($request->images);
        }
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        foreach ($post->images as $image) {
            unlink(public_path('/post_images/') . $image->path);
        }
        $post->tags()->detach();
        $post->delete();
        Session::flash('deleted_post', 'Post Has Deleted Successfully');
        return redirect('posts');
    }







    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required | min:3',
        ]);



        $popularpost = Post::orderBy('views', 'desc')->take(5)->get();
        $f_editor_pick = Post::where('is_editor', 1)->latest()->take(1)->get();
        $editor_pick = Post::where('is_editor', 1)->latest()->skip(1)->take(3)->get();
        $posts_by_date = Post::orderBy('created_at', 'desc')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('F Y');
        });

        $all_category = Category::all();
        $search = $request->input('search');

        $posts = Post::where('title', 'like', "%$search%")->orWhereHas('tags', function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->orWhereHas('user', function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->get();

        $archives = Post::selectRaw("year(created_at) year, monthname(created_at)  month ")->groupBy("year", "month")->orderByRaw("min(created_at) desc")->get()->toArray();

        return view('pages.search', compact('all_category', 'posts', 'popularpost', 'f_editor_pick', 'editor_pick', 'posts_by_date', 'archives'));
    }



    public function archivepost()
    {


        $popularpost = Post::orderBy('views', 'desc')->take(5)->get();
        $f_editor_pick = Post::where('is_editor', 1)->latest()->take(1)->get();
        $editor_pick = Post::where('is_editor', 1)->latest()->skip(1)->take(3)->get();
        $all_category = Category::all();

        $posts = Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();

        $archives = Post::selectRaw("year(created_at) year, monthname(created_at)  month ")->groupBy("year", "month")->orderByRaw("min(created_at) desc")->get()->toArray();


        return view('pages.archive', compact('posts', 'all_category', 'archives', 'popularpost', 'f_editor_pick', 'editor_pick'));
    }
}
