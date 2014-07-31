<?php

class EpisodeRating extends \Eloquent {
	protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'episode_ratings';

    public function user()
    {
        return $this->hasOne('User');
    }

    public function episode()
    {
        return $this->hasOne('Episode');
    }
}