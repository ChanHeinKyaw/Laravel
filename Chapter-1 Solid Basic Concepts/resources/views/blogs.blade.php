<x-layout>
    <x-slot name="title">
        All Blog
    </x-slot>
    @foreach ($blogs as $blog)
        <h1><a href="blogs/{{ $blog->id }}">{{ $blog->title }}</a></h1>
        <div>
            <p>published at - {{ $blog->date }}</p>
            <p>{{ $blog->intro }}</p>
        </div>
    @endforeach
</x-layout>