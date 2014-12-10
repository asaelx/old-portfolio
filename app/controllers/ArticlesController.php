<?php

class ArticlesController extends BaseController{

    public function index(){
        $user = User::where('username', 'asaelx')->first();
        $data = [
            'user' => $user
        ];
        return View::make('article')
            ->with('data', $data);
    }
}