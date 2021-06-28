<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
        <x-button :link="route('backend.user.index')">{{ __('Back') }}</x-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message class="mb-4" :message="session('message')"/>
                    <form method="POST" action="{{ route('backend.user.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                     required autofocus/>
                        </div>
                        <div class="mt-3">
                            <x-label for="email" :value="__('Email')"/>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus/>
                        </div>
                        <div class="mt-3">
                            <x-label for="password" :value="__('Password')"/>
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                     :value="old('password')" required autofocus/>
                        </div>
                        <h4 class="mt-4 text-center font-semibold">{{ __('Roles') }}</h4>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-x-6 mt-3">
                            @foreach($roles as $role)
                                <div class="sm:mt-0 sm:col-span-1 flex flex-col">
                                    <label class="inline-flex items-center mt-1">
                                        <x-checkbox :value="$role->id" :label="$role->name" name="roles[]"
                                                    :checked="in_array($role->id, old('roles', [])) ? 'checked' : ''"/>
                                    </label>
                                </div>
                            @endforeach
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
