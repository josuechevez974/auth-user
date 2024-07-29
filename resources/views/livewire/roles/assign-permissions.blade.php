<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Role') }}
        {{ __($role->name) }}
    </h2>
</x-slot>


<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="w-full">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">
                            {{ __('Assign') }}
                            {{ __('Permissions') }}
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            {{ __('Role') }}
                            {{ __($role->name) }}
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button" wire:navigate href="{{ route('roles.index') }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                    </div>
                </div>

                <div class="flow-root">
                    <div class="mt-8 overflow-x-auto w-full">
                        <div class="py-2 align-middle">
                            <ul class="list-none grid grid-cols-1 md:grid-cols-3 gap-4">
                                @forelse ($permissions as $permission)
                                    <li
                                        class="bg-gray-200 p-3 rounded-lg shadow-sm  hover:bg-gray-200 overflow-hidden flex items-center justify-between">
                                        <div>
                                            <span class="font-semibold">Module:</span>
                                            {{ $permission->name }}
                                            <br>
                                            <span class="font-semibold">Access From:</span>
                                            {{ $permission->guard_name }}
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="font-semibold {{ in_array($permission->name, $roleAssignPermissions) ? 'line-through' : null }}">
                                                {{ __('Assign') }}
                                            </span>
                                            <input type="checkbox" id="permission-{{ $permission->id }}"
                                                wire:model='roleAssignPermissions'
                                                wire:change="changeAssignPermission('{{ $permission->name }}')"
                                                value="{{ $permission->name }}"
                                                class="form-checkbox h-5 w-5 text-indigo-600 hover:text-indigo-700"
                                                onclick="event.stopPropagation()">
                                        </div>
                                    </li>
                                @empty
                                    <li>No permissions available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
