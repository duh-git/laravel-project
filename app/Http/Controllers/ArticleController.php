<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $articles = Article::latest()->paginate(5);
    return view("articles/index", compact("articles"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('articles/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'datePublic' => 'required',
      'title' => 'required',
      'shortDesc' => 'required',
      'desc' => 'required',
    ]);

    $article = Article::create($request->all());

    return redirect()->route('article.show', compact('article'));

  }

  /**
   * Display the specified resource.
   */
  public function show(Article $article)
  {
    return view("articles/show", compact("article"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Article $article)
  {
    return view('articles/edit', compact('article'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Article $article)
  {
    $request->validate([
      'datePublic' => 'required',
      'title' => 'required',
      'shortDesc' => 'required',
      'desc' => 'required',
    ]);

    $article->update($request->all());

    return redirect()->route('article.show', compact('article'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Article $article)
  {
    $article->delete();
    return redirect()->route('article.index');
  }
}
