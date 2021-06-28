<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
        <x-button :link="route('backend.user.index')">{{ __('Back') }}</x-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="sm:grid sm:grid-cols-3">
                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Name') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">{{ $user->name }}</div>

                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Email') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">{{ $user->email }}</div>

                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Role') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">
                            <ul class="list-disc list-inside">
                                @forelse($user->roles as $role)
                                    <li class="text-sm">{{ $role->name }}</li>
                                @empty
                                    <li class="text-sm text-red-400">{{ __('No role found!') }}</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
