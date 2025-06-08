@extends('layouts.dashboard')

@section('title', 'Permissions')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home.index'),
            'Permissions' => route('permissions.index'),
        ]" />
@endpush

@section('content')

    <!-- Permissions Table Section -->
    <div class="max-w-[85rem] md:px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5">
                <div class="p-1.5 align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h1 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    {{ __('permissions.title') }}
                                </h1>
                            </div>

                            <div>
                                <a href="{{ request('prev') ?? url()->previous() }}"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                    {{__('actions.back')}}
                                </a>
                                <div class="inline-flex gap-x-2">
                                    <x-dashboard.components.modal-btn
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        modalId="create-permission-modal"
                                        modalTitle="{{ __('permissions.edit_permission') }}">
                                        {{ __('permissions.add_new') }}
                                    </x-dashboard.components.modal-btn>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <x-dashboard.tables.permissions.permission-table :rows="$permissions" />

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-dashboard.components.modal modalId="create-permission-modal" modalTitle="{{__('permissions.add_new')}}"
        action="{{route('permissions.store')}}" method="POST">
        <div>
            <label for="permission-name" class="block text-sm mb-2 dark:text-white">{{__('permissions.col_name')}}</label>
            <div class="relative">
                <input type="text" id="permission-name" name="permission_name"
                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    required aria-describedby="email-error">
                <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                    <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                        aria-hidden="true">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
            </div>
            @error('permission_name')
                <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </x-dashboard.components.modal>

@endsection

@once
    @push('scripts')

    @endpush
@endonce