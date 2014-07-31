<?php

use Brigham\Podcast\Repositories\EpisodeRatingRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodeRatingController extends \BaseController {

    private $episodeRatingRepository;

    public function __construct(EpisodeRatingRepository $episodeRatingRepository)
    {
        $this->episodeRatingRepository = $episodeRatingRepository;
    }

	public function store()
	{
        if (! Auth::check()) {
            App::abort(403);
        }

        $episode_id = Input::get('episode_id');
        $rating = Input::get('rating');
        $user_id = Auth::user()->id;

        $success = $this->episodeRatingRepository->saveRating($episode_id, $rating, $user_id);

        return Response::json(['sucess' => $success], 202);
	}
}