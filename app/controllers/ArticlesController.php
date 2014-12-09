<?php

class ArticlesController extends BaseController{

    public function index(){
        return View::make('article');
    }
}