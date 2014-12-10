<?php

class AdminController extends BaseController{

    public function index(){
        return View::make('admin.login');
    }

    public function article(){
        return View::make('admin.article');
    }

    public function articles(){
        return View::make('admin.articles');
    }

    public function settings(){
        return View::make('admin.settings');
    }

    public function saveArticle(){
        $all = Input::all();

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($all, $rules);

        if($validator->fails()):
            $messages = $validator->messages();
            return Redirect::to('admin/article')
                ->withErrors($validator);
        else:
            $article = new Article;
            $article->title = Input::get('title');
            $article->content = Input::get('content');
            $article->media = 1;
            $article->user = 1;
            if($article->save()):
                return Redirect::to('admin/articles');
            endif;
        endif;
    }

}