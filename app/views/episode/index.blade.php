@extends('layouts.master')


@section('content')
<div id="show_data">
<h3> {{ $show['name'] }} </h3>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $show['image_src']}}" class="img-responsive"/>
        </div>
        <div class="col-md-6">
            {{ $show['description'] }}
        </div>
    </div>
</div>
<br>
<br>
<div id="episodes">
    @foreach (array_chunk($show->episodes_paginated->getCollection()->all(), 3) as $row)
      <div class="row">
          @foreach($row as $item)
          <article class="col col-md-4">
              <hr>

              <div class="show-guts well">
                  <div class="container-fluid">
                      <a href="{{ URL::route('episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}">
                          <h5 class="show-name">
                              {{ $item['name'] }}
                          </h5>
                      </a>
                  </div>

                  <div class="show-date container-fluid">
                      {{ date('F d, Y', strtotime($item['published_at'])) }}
                  </div>

                  <div class="show-description container">
                      {{ strip_tags($item['description']) }}
                  </div>
              </div>
          </article>
          @endforeach
      </div>
    @endforeach

    {{ $show->episodes_paginated->links() }}
</div>

<style>
    .show-name {
        font-size:18px;
        font-family: arial, serif;
        padding-bottom: 2px;
    }

    .show-name:hover {
        text-decoration: underline;
    }

    .show-date {
        color: #32CD32;
        padding-bottom: 5px;
    }

    .show-description {
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