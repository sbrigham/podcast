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
        return $this->episodes()->paginate(6);
    }
}