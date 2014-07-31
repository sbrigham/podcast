<?php namespace Brigham\Podcast\Repositories;

use EpisodeSession;
class SessionRepository {
    public function saveSession($episode_id, $seconds_in, $user_id)
    {
        $result = EpisodeSession::where('episode_id' , $episode_id)->where('user_id', $user_id);

        $result = $result->first();
        if (is_null($result)) {
            EpisodeSession::create([
                'episode_id' => $episode_id,
                'user_id'    => $user_id,
                'seconds_in' => $seconds_in
            ]);

            return true;
        }

        $result->update(['seconds_in' => $seconds_in]);
        return true;
    }

    public function getSession($episode_id, $id)
    {
        return EpisodeSession::where('episode_id', $episode_id)
                            ->where('user_id', $id)
                            ->firstOrFail();
    }
}