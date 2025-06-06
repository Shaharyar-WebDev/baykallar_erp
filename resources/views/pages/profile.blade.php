@extends('layouts.dashboard')

@section('title', 'Profile')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home.index'),
            'Profile' => route('profile.index'),
        ]" />
@endpush

@section('content')
    <!-- Card Section -->
    <div class="max-w-4xl py-10 sm:px-6 lg:px-8 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-8 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('pages/profile.title') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('pages/profile.description') }}
                </p>
            </div>

            <form id="profile-form" method="POST" action="{{route('user-profile-information.update')}}">
                @method('PUT')
                @csrf
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="af-account-full-name"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/profile.full_name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="af-account-full-name" type="text" value="{{auth()->user()->name}}" name="name"
                                disabled
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg sm:text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Maria">
                        </div>
                        @error('name')
                            <span class="text-red-500 mt-2">
                                {{$message}}
                            </span>
                        @enderror

                    </div>

                    <div class="sm:col-span-3">
                        <label for="af-account-email"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/profile.email') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="af-account-email" type="email" value="{{auth()->user()->email}}" name="email" disabled
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="maria@site.com">
                        @error('email')
                            <span class="text-red-500 mt-2">
                                {{$message}}
                            </span>
                        @enderror
                        @error('updateProfileInformation')
                            <span class="text-error-500">
                                {{$message}}
                            </span>
                        @enderror
                        @if (session('status') == 'profile-information-updated')
                            <x-dashboard.components.alert-box type="success"
                                message="{{__('pages/profile.profile_information_updated')}}" />
                        @endif
                    </div>
                </div>

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button" {{-- href="{{url()->previous('home')}}" --}} id="profile-edit-btn"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        {{ __('pages/profile.edit') }}
                    </button>
                    <button type="submit" id="profile-form-btn" disabled hidden
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        {{ __('pages/profile.save_changes') }}
                    </button>
                </div>

            </form>

            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('pages/profile.update_password') }}
                </h2>
            </div>

            <form id="password-form" method="POST" action="{{route('user-password.update')}}">
                @method('PUT')
                @csrf

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="af-account-password"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/profile.password') ?? 'Password' }}
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="space-y-2">
                            <input id="af-account-password" type="password" name="current_password" disabled
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="{{ __('pages/profile.current_password') }}">
                            <input type="password" name="password" disabled
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="{{ __('pages/profile.new_password') }}">
                            <input type="password" name="password_confirmation" disabled
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="{{ __('pages/profile.confirm_password') }}">
                        </div>
                        @error('current_password', 'updatePassword')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        @if (session('status') == 'password-updated')
                            <x-dashboard.components.alert-box type="success"
                                message="{{__('pages/profile.password_updated')}}" />
                        @endif
                    </div>
                </div>

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button" id="password-edit-btn" {{-- href="{{url()->previous('home')}}" --}}
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        {{ __('pages/profile.edit') }}
                    </button>
                    <button type="submit" id="password-form-btn" hidden disabled
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        {{ __('pages/profile.update_password') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->



@endsection

@push('scripts')

    <script>

        // Profile Form
        const profileForm = document.querySelector('#profile-form');
        const profileEditBtn = document.querySelector('#profile-edit-btn');
        const profileFormBtn = document.querySelector('#profile-form-btn');
        const profileFormInputs = profileForm.querySelectorAll('input');

        // Password Btns
        const passwordForm = document.querySelector('#password-form');
        const passwordEditBtn = document.querySelector('#password-edit-btn');
        const passwordFormBtn = document.querySelector('#password-form-btn');
        const passwordFormInputs = passwordForm.querySelectorAll('input');

        editToggler(profileForm, profileEditBtn, profileFormBtn);
        editToggler(passwordForm, passwordEditBtn, passwordFormBtn);

    </script>
@endpush

