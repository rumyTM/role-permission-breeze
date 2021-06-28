@props(['message'])

@if (!empty($message))
    <div {{ $attributes }}>
        <div class="font-medium text-green-600">
            {{ $message }}
        </div>
    </div>
@endif
