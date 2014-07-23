@extends('layouts.master')


@section('content')

<div class="content well">
    <div id="show-data">
        <div class="row">
            <div id="show-description" class="col-md-9">
                <div>
                    <h1 id="show-name-header"> {{ $show['name'] }} </h1>
                </div>
                <p>
                    {{ $show['description'] }}
                </p>
            </div>
            <div class="col-md-3">
                <img src="{{ $show['image_src']}}" class="img-responsive"/>
            </div>
        </div>
    </div>

    <hr>
    <div id="episodes">
        @foreach (array_chunk($show->episodes_paginated->getCollection()->all(), 3) as $row)
        <div class="row">
            @foreach($row as $item)
            <article class="col col-md-4">
                <a href="{{ URL::route('episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}">
                    <div class="episode-guts well">
                        <div class="episode-date container-fluid">
                            {{ date('F d, Y', strtotime($item['published_at'])) }}
                        </div>
                        <div class="container-fluid">
                            <h5 class="episode-name">
                                {{ $item['name'] }}
                            </h5>
                        </div>

                        <div class="episode-description container">
                            {{ strip_tags($item['description']) }}
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
        @endforeach
    </div>

    <div id ="pager" class="container">
        {{ $show->episodes_paginated->links() }}
    </div>
</div>


<style>
    #show-description {
        color: #FFF;
    }
    #episodes{
        padding-top:15px;
    }

    #pager {
        text-align: center;
    }
    .episode-guts {
        background: #292B2F;
    }
    a:hover{
        text-decoration: none;
    }

    .episode-name {
        font-size:22px;
        font-family: arial, serif;
    }

    .episode-name:hover {
        text-decoration: underline;
    }

    .episode-date {
        color: #32CD32;
        text-align: right;
        font-size: 10px;
    }

    .episode-description {
        font-size: 12px;
    }

    audio {
        width: 100%;
    }

    article {
        padding-bottom: 10px;
    }
</style>

@stop