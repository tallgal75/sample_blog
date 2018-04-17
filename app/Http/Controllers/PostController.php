<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/posts/index';

    /*User must be logged in*/
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
                 ->select(DB::raw('posts.id,posts.title,posts.content,categories.name'))
                 ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
                 ->get();
        $page        = Page::where('name', '=', 'Posts')->first();
        return view('posts/index',compact('posts','page'));
    }

    public function dashboard()
    {
        return view('pages/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search_results(Request $request)
    {
        $searchText     = $request->searchText;
        $search_results = DB::table('posts')
                       ->select(DB::raw('id,title,content'))
                       ->where('title', 'LIKE', '%', $searchText, '%')
                       ->orderBy('title')
                       ->get();
        $search_results->paginate(10);
        return view('posts/search_results', compact('search_results','searchText'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::all();
        return view('posts/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title       = $request->title;
        $content     = $request->content;
        $category_id = $request->category;
        $post        = Post::create(['title' => $title,'content' => $content,'category_id' => $category_id]);
        return redirect($this->redirectTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $id)
    {
        $post          = Post::where('id', $id)->first();
        $related_posts = DB::table('posts')
                       ->select(DB::raw('id,title'))
                       ->where('id', '<>', $id)
                       ->orderBy('title')
                       ->get();
        return view('posts/show', compact('post','related_posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post        = Post::where('id', $id)->first();
        $categories  = Category::all();

        return view('posts/edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {
        Post::where('id', $id)
            ->update([
              'title' => $request->title,
              'content' => $request->content,
              'category_id' => $request->category
            ]);
        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        Post::destroy($id);
    }
}
