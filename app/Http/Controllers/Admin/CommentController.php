<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(5);

        return view('admin.comments.index', [
            'title' => 'Список комментариев',
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        $checks = [
            ['value' => '0', 'title' => 'Не одобрен'],
            ['value' => '1', 'title' => 'Одобрен'],
        ];

        return view('admin.comments.edit', [
            'title' => 'Изменение комментария',
            'comment' => $comment,
            'checks' => $checks,
        ]);
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
        $messages = [
            'required' => 'Поле :attribute не заполнено.',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ], $messages);

        $comment = Comment::find($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('status', 'Комментарий изменен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->route('comments.index')->with('status', 'Комментарий удален.');
    }
}
