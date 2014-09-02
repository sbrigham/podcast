<?php

use Brigham\Podcast\Repositories\SessionRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodeSessionController extends \BaseController {

    private $sessionRepository;

    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

	public function index($episode_id)
	{
        if (! Auth::check()) {
            App::abort(403);
        }

        try {
            $session = $this->sessionRepository->getSession($episode_id, Auth::user()->id);
            $seconds_in = $session['seconds_in'];
        } catch (ModelNotFoundException $e) {
            // There is no session for the logged in user
            $seconds_in = 0;
        }
        return Response::json(['seconds_in' => $seconds_in]);
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