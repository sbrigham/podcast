@extends('layouts.master')

@section('content')
    {{ HTML::style('css/show/index.css') }}
    @include('show.angular')
@stop
