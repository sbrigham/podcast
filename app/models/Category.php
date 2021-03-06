<?php

class Category extends \Eloquent {
	protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function shows() {
        return $this->belongsToMany('Show');
    }
}