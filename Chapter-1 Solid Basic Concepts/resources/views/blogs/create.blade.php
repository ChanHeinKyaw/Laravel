<x-layout>
    <h1 class="my-3 text-center">Blog create form</h1>
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                    <x-error name="title"/>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
                    <x-error name="slug"/>
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">Intro</label>
                    <input type="text" name="intro" class="form-control" id="intro" value="{{ old('intro') }}">
                    <x-error name="intro"/>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
                    <x-error name="body"/>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id"/>
                </div>
                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>