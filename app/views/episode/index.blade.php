@extends('layouts.master')


@section('content')
<h1> Show Page </h1>


<div id="show_data">
    <div> {{ $show['name'] }} </div>

    <div>
        <img src="{{ $show['image_src']}}" class="img-responsive" style="width:50%"/>
    </div>
    <div> {{ $show['description'] }}  </div>
</div>
<br>
<br>
<div id="episodes">
    @foreach (array_chunk($show->episodes_paginated->getCollection()->all(), 3) as $row)
      <div class="row">
          @foreach($row as $item)
          <article class="col col-md-4">
              <div>  {{ $item['name'] }}  </div>
              <div>  {{{ strip_tags($item['description']) }}}  </div>
              <audio controls>
                  <source src="{{$item['src'] }}" type="audio/mpeg">
              </audio>
              <div>
                  {{ HTML::linkRoute('episode', 'View Episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}
              </div>
          </article>
          @endforeach
      </div>
    <br><br>
    @endforeach

    {{ $show->episodes_paginated->links() }}
</div>

@stop