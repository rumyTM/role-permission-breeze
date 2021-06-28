@props(['type' => 'view', 'link' => false])

@if($link)
    <a {{ $attributes->merge(['href' => $link, 'class' => 'w-4 mr-2 transform hover:text-purple-500 focus:outline-none']) }}>
        <x-icon type="{{$type}}"></x-icon>
    </a>
@else
    <button {{ $attributes->merge(['class' => 'w-4 mr-2 transform hover:text-purple-500 focus:outline-none']) }}>
        <x-icon type="{{$type}}"></x-icon>
    </button>
@endif
