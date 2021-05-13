<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin.tags.index', [
            'title' => 'Список тегов',
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create', [
            'title' => 'Добавление тега',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Tag::create($request->all());
        return redirect()->route('tags.index')->with('status', 'Тег добавлен.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit', [
            'title' => 'Изменение тега',
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('status', 'Тег изменен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if ($tag->posts->count() == 0) {
            
            $tag->delete();
            return redirect()->route('tags.index')->with('status', 'Тег удален.');

        } else return redirect()->route('tags.index')->withErrors('Ошибка удаления тега.');
    }
}
