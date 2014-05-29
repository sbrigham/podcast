<?php

class RssFeed extends \Eloquent {
	protected $guarded = [];

    protected $table = 'rss_feeds';

    public function shows()
    {
        return $this->hasOne('Show', 'id', 'show_id');
    }
}