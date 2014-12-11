<?php

class Article extends Eloquent{
    public function user(){
        return $this->belongsTo('User');
    }
    public function media(){
        return $this->belongsTo('Media');
    }
}