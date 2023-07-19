@props(['name'])



    <input
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >
    <x-form.error name="{{ $name }}"/>
