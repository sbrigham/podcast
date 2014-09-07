<?php

Route::filter('admin', function()
{
    if (! Auth::check() || ! Auth::user()->hasRole('admin')) {
        return Redirect::to('/');
    }
;});

App::bind('Brigham\Podcast\Repositories\PodcastRepositoryInterface', 'Brigham\Podcast\Repositories\EloquentPodcastRepository');
App::bind('Brigham\Podcast\Services\PodcastServiceInterface', 'Brigham\Podcast\Services\PodcastService');

// Admin Routes

Route::group(['prefix' => 'admin', 'before' => 'admin'], function() {
    Route::get('/', 'AdminDashboardController@index');

    Route::resource('rss', 'RssFeedController',
        array('except' => array('show')));

    Route::resource('user', 'UsersController',
        array('except' => array('show')));

    Route::resource('category', 'CategoryController');
});

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['index', 'create', 'destroy' , 'store']]);

Route::post('episode/rating', ['as' => 'episode.rating', 'uses' => 'EpisodeRatingController@store']);

Route::resource('register', 'RegistrationController');
Route::get('register', 'RegistrationController@create');

Route::resource('session', 'EpisodeSessionController', ['only' => ['index', 'store']]);

Route::get('/', function() {

    $user = json_encode(null);
    if(Auth::check()) {
        $user = Auth::user()->get()->toJson();
    }

    return View::make('index')->with('user', $user);
});

// API FOR SHOWS AND EPISODES
Route::group(['prefix' => 'api'], function() {
    Route::get('show/{show_id}', 'ShowController@show');
    Route::get('shows', 'ShowController@index');
    Route::get('show/{show_id}/episodes', 'EpisodeController@index');
    Route::get('episode/{episode_id}', 'EpisodeController@show');

    Route::get('episode/{episode_id}/session', 'EpisodeSessionController@index');
    Route::post('episode/{episode_id}/session', 'EpisodeSessionController@store');

    Route::post('episode/{episode_id}/rating', 'EpisodeRatingController@store');
});

Route::get('show', 'ShowController@index');
Route::get('shows',['as' =>'shows', 'uses' => 'ShowController@index']);
Route::get('show/all', 'ShowController@all');

Route::get('episodes', ['as' => 'episodes', 'uses' => 'EpisodeController@index']);
Route::get('episode/{episode}', ['as' => 'episode.id', 'uses' => 'EpisodeController@show']);
Route::get('episodes/all', 'EpisodeController@all');

Route::get('/{show_id}/about', 'ShowController@show');
Route::get('/{show_id}', [ 'as'=> 'show', 'uses' => 'ShowController@show']);
Route::get('/{show_id}/episode/{episode_id}', ['as' => 'episode', 'uses' => 'EpisodeController@show']);

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});