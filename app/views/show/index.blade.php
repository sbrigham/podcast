@extends('layouts.master')

@section('content')
<div>
    Welcome to Podcast
</div>

<div class="container" id="shows">
    @foreach(array_chunk($shows->getCollection()->all(), 3) as $show)
      <div class="row">
          @foreach($show as $item)
          <div class="show well col-md-4">
              <div>
                  <a href="{{ URL::route('show', ['show_id' => $item['id']]) }}">
                      <img src="{{ $item['image_src'] }}" class="img-responsive"/>
                  </a>
              </div>
              <div class="show-name">
                  <a href="{{ URL::route('show', ['show_id' => $item['id']]) }}">
                      <h3> {{ $item['name'] }} </h3>
                  </a>
              </div>
          </div>
          @endforeach
      </div>
    <hr>
    @endforeach

    {{ $shows->links() }}
</div>

<style>
    .show-name h3{
        font-size: 21px;
    }
</style>

@stop

