<?php

use Brigham\Podcast\Repositories\SessionRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodeSessionController extends \BaseController {

    private $sessionRepository;

    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

	public function index()
	{
        if (! Auth::check()) {
            App::abort(403);
        }

        $episode_id = Input::get('episode');

        $session = $this->sessionRepository->getSession($episode_id, Auth::user()->id);

        return Response::json(['seconds_in' => $session['seconds_in']]);
	}

	public function store()
	{
        if (! Auth::check()) {
            App::abort(403);
        }

        $episode_id = Input::get('episode_id');
        $seconds_in = Input::get('current_time');
        $user_id = Auth::user()->id;

        $success = $this->sessionRepository->saveSession($episode_id, $seconds_in, $user_id);

        return Response::json(['sucess' => $success], 202);
	}
}