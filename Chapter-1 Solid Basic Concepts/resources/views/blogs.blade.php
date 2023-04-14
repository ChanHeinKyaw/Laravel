<x-layout>
    <x-slot name="title">
        All Blog
    </x-slot>
    @foreach ($blogs as $blog)
        <h1><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
        <p>
            <a href="/categories/{{ $blog->category->slug }}">
                {{ $blog->category->name }}
            </a>
        </p>
        <div>
            <p>published at - {{ $blog->date }}</p>
            <p>{{ $blog->intro }}</p>
        </div>
    @endforeach
</x-layout>