@extends('layouts.master')


@section('content')
<div class="content well">
    @include('episode.angular')
</div>


<style>
    #episodes{
        padding-top:15px;
    }

    #pager {
        text-align: center;
    }
    .episode-guts {
        text-shadow: rgba(0, 0, 0, 0.298039) 1px 1px 1px;
    }
    a:hover{
        text-decoration: none;
    }

    .episode-name {
        font-size:22px;
    }

    .episode-name:hover {
        text-decoration: underline;
    }

    .episode-date {
        color: #32CD32;
        font-size: 10px;
        text-align: right;
        margin-top: -5px;
        margin-right: -5px;
    }

    .episode-description {
        font-size: 12px;
    }

    audio {
        width: 100%;
    }
</style>

@stop