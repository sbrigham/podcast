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

    public function rating()
    {
        return $this->hasMany('EpisodeRating');
    }

    public function sourceIsActive() {
        try {

            fopen($this->src, 'r');

        } catch(\Exception $e) {

            return false;

        }

        return true;
    }
}