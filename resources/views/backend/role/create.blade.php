<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Role') }}
        </h2>
        <x-button :link="route('backend.role.index')">{{ __('Back') }}</x-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message class="mb-4" :message="session('message')"/>
                    <form method="POST" action="{{ route('backend.role.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="e.g. Author"
                                     required autofocus/>
                        </div>
                        <div class="mt-3">
                            <x-label for="identifier" :value="__('Identifier')"/>
                            <x-input id="identifier" class="block mt-1 w-full" type="text" name="identifier"
                                     :value="old('identifier')" placeholder="e.g. author" required autofocus/>
                        </div>
                        <h4 class="mt-4 text-center font-semibold">{{ __('Permissions') }}</h4>
                        <div class="sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-3 mt-3">
                            @foreach($modules as $module)
                                @if($module->permissions->count())
                                    <div class="mt-2 sm:mt-0 sm:col-span-1 flex flex-col">
                                        <x-label for="name" class="font-semibold" :value="$module->name"/>
                                        @foreach($module->permissions as $permission)
                                            <label class="inline-flex items-center mt-1">
                                                <x-checkbox :value="$permission->id" :label="$permission->name"
                                                            name="permissions[]" :checked="in_array($permission->id, old('permissions', [])) ? 'checked' : ''"/>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
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
