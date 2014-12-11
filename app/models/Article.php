<?php

class Article extends Eloquent{
    public function media(){
        return $this->hasOne('Media');
    }
}