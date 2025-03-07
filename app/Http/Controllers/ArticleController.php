<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleMail;
use App\Jobs\VeryLongJob;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $articles = Article::latest()->paginate(5);
    return view("articles/index", compact("articles"));
    // return response()->json($articles, 200);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $this->authorize('create', [self::class]);
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
    if ($article)
      VeryLongJob::dispatch($article);

    return redirect()->route('article.show', compact('article'));
    // return response()->json($article, 200);
  }

  /**
   * Display the specified resource.
   */
  public function show(Article $article)
  {
    return view("articles/show", compact("article"));
    // return response()->json($article, 200);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Article $article)
  {
    $this->authorize('update', [self::class, $article]);
    return view('articles/edit', compact('article'));
    // return response()->json($article, 200);
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
    // return response()->json($article, 200);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Article $article)
  {
    // return response()->json($article->delete(), 201);
    $article->delete();
    return redirect()->route('article.index');
    // return response()->json($article, 201);
  }
}
