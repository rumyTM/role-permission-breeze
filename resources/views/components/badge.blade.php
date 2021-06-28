@props(['color' => 'indigo'])

<span class="bg-{{$color}}-200 text-{{$color}}-600 py-1 px-3 rounded-md text-xs">
    {{$slot}}
</span>
