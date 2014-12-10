<?php

class ArticlesController extends BaseController{

    public function index($id){
        $user = User::where('username', 'asaelx')->first();
        $article = Article::find($id);
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