<?php namespace Brigham\Podcast\Services;

use Brigham\Podcast\Builders\Providers\SimplePie\PodcastBuilder;
use Brigham\Podcast\Repositories\EpisodeRatingRepository;
use Brigham\Podcast\Repositories\EpisodeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EpisodeService {
    private $episode_repo;
    private $episode_rating_repo;

    public function __construct(EpisodeRepository $episode_repo, EpisodeRatingRepository $episode_rating_repo)
    {
        $this->episode_repo = $episode_repo;
        $this->episode_rating_repo = $episode_rating_repo;
    }

    public function getEpisode($episode_id)
    {
        try {
            $episode = $this->episode_repo->getEpisode($episode_id);
        } catch(ModelNotFoundException $e) {
            App::abort(404);
        }
        $episode->name = html_entity_decode($episode->name);
        $episode->description = strip_tags($episode->description);
        $episode->description = html_entity_decode($episode->description);
        $episode->rating = $episode->rating()->avg('rating');

        if (Auth::check()) {
            $episode->user_rating = $this->getEpisodeRating($episode_id, Auth::user()->id);
        }
        return $episode;
    }

    public function getAllEpisodes ($json = true) {
        $episodes = $this->episode_repo->getAll();

        foreach ($episodes as $episode) {
            $episode->link = route('episode.id', ['episode' => $episode->id]);
        }

        if ($json) {
            return $episodes->toJson();
        }

        return $episodes;
    }

    public function getEpisodeAverageRating($episode_id)
    {
        return $this->episode_rating_repo->getAverageRating($episode_id);
    }

    public function getEpisodeRating($episode_id, $user_id)
    {
        return $this->episode_rating_repo->getRating($episode_id, $user_id);
    }

    public function getEpisodes($show_id)
    {
        $episodes = $this->episode_repo->getEpisodes($show_id);

        foreach($episodes as $index => $value) {
            $episodes[$index]->name = html_entity_decode($episodes[$index]->name);
        }
        return $episodes;
    }
}