@props(['name', 'value' => ''])
<div class="mb-3">
    <x-form.label name="{{ $name }}"/>
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" class="form-control editor">{!!  old($name,$value) !!}</textarea>
    <x-error name="{{ $name }}"/>
</div>