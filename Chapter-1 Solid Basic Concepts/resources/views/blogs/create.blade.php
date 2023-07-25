<x-admin-layout>
    <h1 class="text-center">Blog create form</h1>
    <x-card-wrapper>
        <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="intro"/>
            <x-form.textarea name="body"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id"/>
            </x-form.input-wrapper>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>