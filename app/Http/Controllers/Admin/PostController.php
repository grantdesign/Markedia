<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Tag;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->orderBy('id', 'desc')->paginate(5);

        return view('admin.posts.index', [
            'title' => 'Список статей',
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();

        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.create', [
            'title' => 'Добавление статьи',
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('thumbnail')) {

            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");

        }

        $post = Post::create($data);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('status', 'Статья добавлена.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::pluck('title', 'id')->all();

        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.edit', [
            'title' => 'Изменение статьи',
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('thumbnail')) {
            
            Storage::delete($post->thumbnail);
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");

        } else $data['thumbnail'] = $request->img ?? null;

        $post->update($data);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('status', 'Статья изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->thumbnail);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Статья удалена.');
    }
}
