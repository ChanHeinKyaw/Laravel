@extends('layout')
@section('title')
    {{ $blog->title }}
@endsection
@section('content')
    <h1>{{ $blog->title }}</h1>
    <div>{!! $blog->body !!}</div>
    <a href="/">Go Back</a>
@endsection
