<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
        </h2>
        @can('role_create')
            <x-button :link="route('backend.role.create')">{{ __('Create') }}</x-button>
        @endcan
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <x-success-message class="m-4" :message="session('message')"/>
                    <x-table>
                        <x-slot name="header">
                            <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
                            <th class="py-3 px-6 text-left">{{ __('Identifier') }}</th>
                            <th class="py-3 px-6 text-center">{{ __('Users') }}</th>
                            <th class="py-3 px-6 text-center">{{ __('Permissions') }}</th>
                            <th class="py-3 px-6 text-right">{{ __('Actions') }}</th>
                        </x-slot>
                        @forelse($roles as $role)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 {{ $loop->even ? '' : 'bg-gray-50' }}">
                                <td class="py-3 px-6 text-left">
                                    {{ $role->name }}
                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{ $role->identifier }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <x-badge>{{ $role->users_count }}</x-badge>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <x-badge>{{ $role->permissions_count }}</x-badge>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <div class="flex justify-end">
                                        @can('role_access')
                                            <x-button-icon type="view"
                                                           :link="route('backend.role.show', $role->id)"></x-button-icon>
                                        @endcan
                                        @can('role_edit')
                                            <x-button-icon type="edit"
                                                           :link="route('backend.role.edit', $role->id)"></x-button-icon>
                                        @endcan
                                        @can('role_delete')
                                            <form method="POST" action="{{ route('backend.role.destroy', $role->id) }}"
                                                  onsubmit="return confirm('{{ __('Are you sure?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <x-button-icon type="delete"></x-button-icon>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td colspan="5" class="py-3 px-6 text-center">{{ __('No role found!') }}</td>
                            </tr>
                        @endforelse
                    </x-table>
                </div>
                @if($roles->hasPages())
                    <div class="p-3">
                        {{ $roles->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
