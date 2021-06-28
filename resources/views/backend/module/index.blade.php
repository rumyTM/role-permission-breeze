<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Module') }}
        </h2>
        @can('module_create')
            <x-button :link="route('backend.module.create')">{{ __('Create') }}</x-button>
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
                            <th class="py-3 px-6 text-center">{{ __('Permissions') }}</th>
                            <th class="py-3 px-6 text-right">{{ __('Actions') }}</th>
                        </x-slot>
                        @forelse($modules as $module)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 {{ $loop->even ? '' : 'bg-gray-50' }}">
                                <td class="py-3 px-6 text-left">
                                    {{ $module->name }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <x-badge>{{ $module->permissions_count }}</x-badge>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <div class="flex justify-end">
                                        @can('module_access')
                                            <x-button-icon type="view"
                                                           :link="route('backend.module.show', $module->id)"></x-button-icon>
                                        @endcan
                                        @can('module_edit')
                                            <x-button-icon type="edit"
                                                           :link="route('backend.module.edit', $module->id)"></x-button-icon>
                                        @endcan
                                        @can('module_delete')
                                            <form method="POST"
                                                  action="{{ route('backend.module.destroy', $module->id) }}"
                                                  onsubmit="return confirm('{{ __('Are you sure?') }}')">
                                                @method('DELETE')
                                                @csrf
                                                <x-button-icon type="delete"></x-button-icon>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td colspan="3" class="py-3 px-6 text-center">{{ __('No module found!') }}</td>
                            </tr>
                        @endforelse
                    </x-table>
                </div>
                @if($modules->hasPages())
                    <div class="p-3">
                        {{ $modules->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
