<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Article $article)
  {
    $comment = new Comment();
    $comment->article_id = $article->id;
    $comment->user_id = auth()->user()->id;
    $comment->content = request()->content;
    $comment->save();

    return redirect()->route("article.show", [$article->id])->with("success", "Comment posted");
  }

  /**
   * Display the specified resource.
   */
  public function show(Comment $comment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Comment $comment)
  {
    $this->authorize('update', [Comment::class, $comment]);
    return view('comments.edit', compact('comment'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Comment $comment)
  {
    $this->authorize('update', [Comment::class, $comment]);
    $request->validate([
      'content' => 'required',
    ]);

    $comment->update($request->all());

    return redirect()->route('article.show', [$comment->article_id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Comment $comment)
  {
    $this->authorize('delete', [Comment::class, $comment]);
    $comment->delete();
    return redirect()->back();
  }
}
