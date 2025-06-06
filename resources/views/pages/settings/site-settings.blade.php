@extends('layouts.dashboard')

@section('title', 'Site Settings')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home.index'),
            'Settings' => '',
            'Site Settings' => route('site.settings')
        ]" />
@endpush

@section('content')

    <!-- Site Settings Section -->
    <div class="max-w-4xl py-10 sm:px-6 lg:px-8 mx-auto">
        <div class="bg-white rounded-xl shadow-xs p-8 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('pages/settings/site-settings.site_settings') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('pages/settings/site-settings.site_settings_description') }}
                </p>
            </div>

            <form id="site-settings-form" method="POST" action="{{route('site.settings.update')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <!-- Site Logo -->
                    <div class="sm:col-span-3">
                        <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.site_logo') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex flex-col md:flex-row justify-evenly items-center gap-5">
                            <img id="preview-logo"
                                class="inline-block size-26 overflow-visible ring-white dark:ring-neutral-900 object-cover" src="{{ $settings['site.logo'] ? asset('storage/'.$settings['site.logo']) : '' }}" alt="Site Logo">
                            <label id="logo-upload-btn" for="logo" disabled
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 cursor-pointer">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" x2="12" y1="3" y2="15"></line>
                                </svg>
                                Upload photo
                                <input onchange="imgPreview(event, `preview-logo`)" type="file" id="logo"
                                    name="site_logo" accept="image/*" class="hidden">
                            </label>
                        </div>
                         @error('logo')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <!-- Site Name -->
                    <div class="sm:col-span-3">
                        <label for="site_name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.site_name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text" name="site_name" id="site_name"
                            value="{{ old('site_name', $settings['site.name'] ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="{{ __('pages/settings/site-settings.site_name_placeholder') }}">
                         @error('site_name')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <!-- Site Slogan -->
                    <div class="sm:col-span-3">
                        <label for="site_slogan" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.site_slogan') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text" name="site_slogan" id="site_slogan"
                            value="{{ old('site_slogan', $settings['site.slogan']  ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="{{ __('pages/settings/site-settings.site_slogan_placeholder') }}">
                        @error('site_slogan')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <!-- Logo Width -->
                    <div class="sm:col-span-3">
                        <label for="logo_width" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.logo_width') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="number" name="logo_width" id="logo_width"
                            value="{{ old('logo_width', $settings['site.logo_width'] ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="enter value">
                          @error('logo_width')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <!-- Logo Height -->
                    <div class="sm:col-span-3">
                        <label for="logo_height" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.logo_height') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="number" name="logo_height" id="logo_height"
                            value="{{ old('logo_height', $settings['site.logo_height'] ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="enter value">
                          @error('logo_height')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                      <!--Auth Logo Width -->
                    <div class="sm:col-span-3">
                        <label for="logo_width" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.logo_width') }} (Auth)
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="number" name="auth_logo_width" id="logo_width"
                            value="{{ old('auth_logo_width', $settings['auth.logo_width'] ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="enter value">
                          @error('auth_logo_width')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <!--Auth Logo Height -->
                    <div class="sm:col-span-3">
                        <label for="logo_height" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('pages/settings/site-settings.logo_height') }} (Auth)
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="number" name="auth_logo_height" id="logo_height"
                            value="{{ old('auth_logo_height', $settings['auth.logo_height'] ?? '') }}"
                            class="py-2 px-3 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300"
                            placeholder="enter value">
                          @error('auth_logo_height')
                            <span class="text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- End Grid -->

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="reset" id="edit-btn"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        {{ __('actions.edit') }}
                    </button>
                    <button type="submit" id="submit-btn"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            {{ __('actions.save_changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const siteSettingsForm = document.querySelector('#site-settings-form');
        const siteSettingsEditBtn = siteSettingsForm.querySelector('#edit-btn');
        const siteSettingsSubmitBtn = siteSettingsForm.querySelector("#submit-btn");
        const logoUpBtn = document.querySelector('#logo-upload-btn');



        editToggler(siteSettingsForm, siteSettingsEditBtn, siteSettingsSubmitBtn, editKey = '{{__('actions.cancel')}}');

        const imgPreview = (e, elementId) => {
            try {

                let element = document.querySelector(`#${elementId}`);
                let file = e.target.files[0];
                const reader = new FileReader();

                reader.readAsDataURL(file);

                reader.addEventListener('load', () => {
                    element.src = reader.result;
                });
            } catch (error) {
                console.warn(error);
            }
        }

    </script>
@endpush
