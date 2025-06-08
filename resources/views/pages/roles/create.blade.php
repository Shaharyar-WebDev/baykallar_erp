@extends('layouts.dashboard')

@section('title', 'Create Roles')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home.index'),
            'Roles' => route('roles.index'),
            'Create' => route('roles.create'),
        ]" />
@endpush

@section('content')

    <div class="bg-white rounded-xl shadow-xs p-8 dark:bg-neutral-800">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{__('role.create_assign_role')}}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{__('role.define_role')}}</p>
        </div>

        <form class="space-y-6" action="{{route('roles.store')}}" method="POST">
            @csrf
            <!-- Role Name -->
            <div class="mb-8">
                <label for="role-name" class="flex text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{__('role.role_name')}}
                </label>
                <input type="text" id="role-name" name="role_name" placeholder="e.g. Admin, Manager"
                    value="{{old('role_name')}}"
                    class="py-2 px-4 block w-full border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white"
                    required>
                @error('role_name')
                    <span class="text-red-500 mt-2">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <!-- Permissions -->
            <div class="mb-8">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{__('role.permissions')}}</label>
                <div
                    class="max-h-48 overflow-y-auto border border-gray-200 dark:border-neutral-700 rounded-md p-4 grid grid-cols-2 gap-4">
                    @forelse ($permissions as $permission)
                        <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300"
                            for="permission-{{$permission->id}}">
                            <input type="checkbox" id="permission-{{$permission->id}}" value="{{$permission->name}}"
                                name="permissions[]"
                                class="hs-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700">
                            <span>{{$permission->name}}</span>
                        </label>
                    @empty
                        <div class="col-span-2 text-center py-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{__('role.no_permissions')}}</p>
                            <a href="{{route('permissions.index', ['prev' => request()->fullUrl()])}}"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                {{__('permissions.add_new')}}
                            </a>
                        </div>
                    @endforelse

                    <!-- Add more permission options here -->
                </div>
                @error('permissions')
                    <span class="text-red-500 mt-2">
                        {{$message}}
                    </span>
                @enderror
                @error('permissions.*')
                    <span class="text-red-500 mt-2">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex flex-col gap-2 md:flex-row justify-end">
                    <a href="{{ request('prev') ?? url()->previous() }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        {{__('actions.back')}}
                    </a>
                <a href="{{route('permissions.index', ['prev' => request()->fullUrl()])}}"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    {{__('permissions.add_new')}}
                </a>
                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    {{__('Save')}}
                </button>
            </div>
        </form>
    </div>

@endsection

@once
    @push('scripts')

    @endpush
@endonce