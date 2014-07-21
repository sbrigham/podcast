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
              <div>
                  <a href="{{ URL::route('episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}">
                      <div class="show-name col-md-7">
                          {{ $item['name'] }}
                      </div>
                      <div class="col-md-5 show-date" style = 'float:left'>
                          {{ date('F d, Y', strtotime($item['published_at'])) }}
                      </div>
                  </a>
              </div>
              <div class="audio">
                  <audio controls>
                      <source src="{{$item['src'] }}" type="audio/mpeg">
                  </audio>
              </div>
              <div class="show-description">
                  {{{ strip_tags($item['description']) }}}
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
        padding-bottom: 5px;
    }

    .show-name:hover {
        text-decoration: underline;
    }

    .show-date {
        text-align: right;
        color: #FFF;
    }

    .show-description {
        color: #FFF;
    }

    .audio {
        padding-bottom: 10px;
    }

    audio {
        width: 100%;
    }

    article {
        padding-bottom: 10px;
    }
</style>

@stop