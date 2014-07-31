<?php namespace Brigham\Podcast\Repositories;

use EpisodeRating;
class EpisodeRatingRepository {
    public function saveRating($episode_id, $rating, $user_id)
    {
        $result = EpisodeRating::where('episode_id' , $episode_id)->where('user_id', $user_id);

        $result = $result->first();
        if (is_null($result)) {
            EpisodeRating::create([
                'episode_id' => $episode_id,
                'user_id'    => $user_id,
                'rating' => $rating
            ]);

            return true;
        }

        $result->update(['rating' => $rating]);
        return true;
    }

    public function getRating($episode_id, $user_id)
    {
        $user_rating = EpisodeRating::where('episode_id', $episode_id)
            ->where('user_id', $user_id)
            ->first();
        if( is_null($user_rating)) {
            return $user_rating;
        }

        return $user_rating->rating;

    }

    public function getAverageRating($episode_id) {
        return EpisodeRating::where('episode_id', $episode_id)->remember(30)
            ->avg('rating');
    }
}