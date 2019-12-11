<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends PagesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories', 'tags'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Category::create($input);
        return redirect('categories');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::all();
        $popularpost = Post::orderBy('views', 'desc')->take(5)->get();
        $breaking = Post::where('is_breaking', 1)->latest()->take(1)->get();
        $post_by_category = Post::where('category_id', $id)->latest()->take(3)->get();
        $f_editor_pick = Post::where('is_editor', 1)->latest()->take(1)->get();
        $editor_pick = Post::where('is_editor', 1)->latest()->skip(1)->take(3)->get();
        $all_category = Category::with('posts')->get();
        $category = Category::findOrFail($id);

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month ')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();


        if ($category !== null) {
            $posts = $category->posts;
            return view('admin.categories.show', compact('posts', 'post_by_category', 'category', 'all_category', 'tags', 'popularpost', 'breaking', 'f_editor_pick', 'editor_pick',  'archives'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
        $input = $request->all();
        $category = Category::findOrFail($id);
        $category->update($input);
        return redirect('categories');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Session::flash('deleted_category', 'Category Has Deleted Successfully');
        return redirect('categories');
    }
}
