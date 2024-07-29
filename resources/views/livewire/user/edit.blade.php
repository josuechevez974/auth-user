<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update') }} User
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="w-full">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Update') }} User</h1>
                        <p class="mt-2 text-sm text-gray-700">
                            Update existing {{ __('User') }}.
                            @if (Session::has('success'))
                                {{ Session::get('success') }}
                            @endif
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button" wire:navigate href="{{ route('users.index') }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                    </div>
                </div>

                <div class="flow-root">
                    <div class="mt-8 grid lg:grid-cols-2 sm:grid-cols-2 gap-4 sm:grid-cols-1">
                        <div class="max-w-xl py-2 align-middle">
                            <form method="POST" wire:submit="save" role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                @include('livewire.user.form')
                            </form>
                        </div>
                        <div class="max-w-xl py-2 align-super">
                            <h2 class="text-2xl font-bold mb-4 text-start">Roles</h2>
                            <ul class="divide-y divide-gray-200">
                                @forelse ($roles as $role)
                                    <li class="py-2 flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                                            {{ strtoupper(substr($role->name, 0, 1)) }}
                                        </div>
                                        <div class="ml-4 grid grid-cols-2 gap-3">
                                            <label for="roles-{{ $role->name }}"
                                                class="text-lg font-medium text-gray-900 w-20">
                                                {{ $role->name }}
                                            </label>
                                            <input type="checkbox" value="{{ $role->name }}"
                                                id="'role-'.{{ $role->name }}"
                                                wire:change="changeAssigRole('{{ $role->name }}')"
                                                wire:model='userRoles' class="mt-1 text-blue-600 focus:ring-blue-500">
                                        </div>
                                    </li>
                                @empty
                                    <li class="py-2 text-center text-gray-500">No roles found</li>
                                @endforelse
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
