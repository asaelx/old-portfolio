<?php

class ProjectsController extends BaseController{

    public function index(){
        $user = User::where('username', 'asaelx')->first();
        $projects = Article::all();
        $data = [
            'user' => $user,
            'projects' => $projects
        ];
        return View::make('projects')
            ->with('data', $data);
    }
}