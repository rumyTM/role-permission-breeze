<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Module') }}
        </h2>
        <x-button :link="route('backend.module.index')">{{ __('Back') }}</x-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message class="mb-4" :message="session('message')"/>
                    <form method="POST" action="{{ route('backend.module.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="e.g. Post Management"
                                     required autofocus/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
