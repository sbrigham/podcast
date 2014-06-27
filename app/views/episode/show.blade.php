@extends('layouts.master')

@section('content')

<h1> Episode Details Page </h1>

<div> {{ $episode['name'] }} </div>
<div> <img src ="{{ $episode['image_src'] }}"/> </div>
<div> {{ $episode['description'] }} </div>
<div>
    <audio controls>
        <source src="{{ $episode['src'] }}" type="audio/mpeg"/>
    </audio>
</div>

@stop