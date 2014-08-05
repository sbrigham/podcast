<?php

class Show extends \Eloquent {
	protected $guarded = [];

    protected $table = 'shows';

    public function episodes()
    {
        return $this->hasMany('Episode', 'show_id', 'id');
    }

    /**
     * Paginated posts accessor. Access via $show->posts_paginated
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getEpisodesPaginatedAttribute()
    {
        return $this->episodes()->orderBy('published_at', 'DESC')->paginate(6);
    }

    public function categories() {
        return $this->belongsToMany('Category', 'show_categories', 'show_id', 'category_id');
;    }
}