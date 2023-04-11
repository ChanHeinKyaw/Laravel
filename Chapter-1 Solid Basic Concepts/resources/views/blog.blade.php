<x-layout>
    <x-slot name="title">
        {{ $blog->title }}
    </x-slot>
    <h1>{{ $blog->title }}</h1>
    <div>{!! $blog->body !!}</div>
    <a href="/">Go Back</a>
</x-layout>