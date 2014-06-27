<?php

class Episode extends \Eloquent {
	protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'episodes';

    public function show()
    {
        return $this->belongsTo('Show');
    }
}