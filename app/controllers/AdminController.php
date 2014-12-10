<?php

class AdminController extends BaseController{

    public function index(){
        return View::make('admin.login');
    }

    public function articles(){
        return View::make('admin.articles');
    }

}