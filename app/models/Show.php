<?php

class Show extends \Eloquent {
	protected $guarded = [];

    protected $table = 'shows';

    public function rss()
    {
        return $this->belongsTo('RssFeed', 'id');
    }

    public function episodes()
    {
        return $this->hasMany('Episodes');
    }
}