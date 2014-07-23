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

@if(isset($_GET['page']))
  {{ $show->episodes_paginated->links() }}
@endif

<div id="episodes">
    @foreach (array_chunk($show->episodes_paginated->getCollection()->all(), 3) as $row)
      <div class="row">
          @foreach($row as $item)
          <article class="col col-md-4">
              <hr>

              <a href="{{ URL::route('episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}">
              <div class="show-guts well">
                  <div class="container-fluid">

                          <h5 class="show-name">
                              {{ $item['name'] }}
                          </h5>

                  </div>

                  <div class="show-date container-fluid">
                      {{ date('F d, Y', strtotime($item['published_at'])) }}
                  </div>

                  <div class="show-description container">
                      {{ strip_tags($item['description']) }}
                  </div>
              </div>
              </a>
          </article>
          @endforeach
      </div>
    @endforeach
</div>
{{ $show->episodes_paginated->links() }}

<style>

    a:hover{
        text-decoration: none;
    }

    .show-name {
        font-size:18px;
        font-family: arial, serif;
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