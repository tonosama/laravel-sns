<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Article::class,'article');

    }


    // 一覧表示
    public function index(){
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    // 登録
    public function create(){

        return view('articles.create');
    }

    public function edit(Article $article){
        return view('articles.edit',['article' => $article]);
    }

    public function store(ArticleRequest $request, Article $article){
        $article->fill($request->all()); //-- この行を追加
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    public function update(ArticleRequest $request, Article $article){
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article){
        return view('articles.show', ['article' => $article]);
    }

}
