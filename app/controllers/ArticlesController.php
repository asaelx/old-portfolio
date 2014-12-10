<?php

class ArticlesController extends BaseController{

    public function index($slug){
        $user = User::where('username', 'asaelx')->first();
        $article = Article::where('slug', $slug)->first();
        $media = Media::find($article->media);
        $article->media = $media;
        $data = [
            'user' => $user,
            'article' => $article
        ];
        return View::make('article')
            ->with('data', $data);
    }
}