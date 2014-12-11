<?php

class StreamController extends BaseController{

    public function index(){
        $user = User::where('username', 'asaelx')->first();
        $articles = Article::all();
        $data = [
            'user' => $user,
            'articles' => $articles
        ];
        return View::make('stream')
            ->with('data', $data);
    }

    public function article($slug){
        $user = User::where('username', 'asaelx')->first();
        $article = Article::with('media', 'user')->where('slug', $slug)->first();
        $data = [
            'user' => $user,
            'article' => $article
        ];
        return View::make('article')
            ->with('data', $data);
    }
}