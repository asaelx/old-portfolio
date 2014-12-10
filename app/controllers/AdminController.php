<?php

class AdminController extends BaseController{

    public function index(){
        return View::make('admin.login');
    }

    public function articles(){
        return View::make('admin.articles');
    }

    public function settings(){
        return View::make('admin.settings');
    }

    public function updateSettings(){
        $all = Input::all();
        return $all;
    }

}