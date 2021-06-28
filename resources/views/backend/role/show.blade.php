<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
        </h2>
        <x-button :link="route('backend.role.index')">{{ __('Back') }}</x-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="sm:grid sm:grid-cols-3">
                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Name') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">{{ $role->name }}</div>

                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Identifier') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">{{ $role->identifier }}</div>

                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('User') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">
                            <ul class="list-disc list-inside">
                                @forelse($role->users as $user)
                                    <li class="text-sm">{{ $user->name }}</li>
                                @empty
                                    <li class="text-sm text-red-400">{{ __('No user found!') }}</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="sm:col-span-1 sm:py-2 font-semibold">{{ __('Permission') }}</div>
                        <div class="pb-3 sm:col-span-2 sm:py-2 text-sm">
                            <ul class="list-disc list-inside">
                                @forelse($role->permissions as $permission)
                                    <li class="text-sm">{{ $permission->name }}</li>
                                @empty
                                    <li class="text-sm text-red-400">{{ __('No permission found!') }}</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
