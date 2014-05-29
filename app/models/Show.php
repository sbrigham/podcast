<?php

class Show extends \Eloquent {
	protected $guarded = [];

    protected $table = 'shows';

    public function episodes()
    {
        return $this->hasMany('Episodes');
    }
}