<?php

class Media extends Eloquent{
    public function user(){
        return $this->hasOne('User');
    }
}