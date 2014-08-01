@extends('layouts.master')

@section('content')
<div class="container" id="shows">
    @foreach(array_chunk($shows->getCollection()->all(), 3) as $show)
      <div class="row">
          @foreach($show as $item)
          <article class="show col col-md-4">
              <div class="well">
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
          </article>
          @endforeach
      </div>
    @endforeach

    {{ $shows->links() }}
</div>

<style>
    .show-name h3{
        font-size: 21px;
    }

    .show {
        padding-left: 5px;
        padding-right: 5px;
    }

</style>

@stop

