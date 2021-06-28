@props(['label', 'checked' => false])

<input {{ $checked ? 'checked' : '' }} type="checkbox" {!! $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
@if(isset($label))
    <span class="mt-0.5 ml-2 font-medium text-sm text-gray-700">{{$label}}</span>
@endif
