@extends('layouts.app')

@section('title')
	Post
@stop

@section('content')
	{{--<h1>ID:  {{$id}}</h1>--}}
	{{--<h1>Name: {{$name}}</h1>--}}
	{{--<h1>E-mail: {{$email}}</h1>--}}
	@foreach($posts as $post)
        <h1>{{$post->title}}</h1>
        <div>
            <p>{{$post->content}}</p>
        </div>
    @endforeach
@stop

