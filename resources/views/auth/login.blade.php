@extends('components.layouts.auth-layout')

@section('title', 'Login')

@section('main')

    <section id="login" class="glass-card w-full max-w-md rounded-xl overflow-hidden">
        <div class="p-8">

            <!-- Header -->
            <x-auth.header />
       
            <!-- Login Form -->
            <form class="space-y-5" method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.email')}}</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{old('email')}}"
                            class="form-input w-full px-4 py-3 text-slate-700 border border-slate-300 rounded-lg focus:ring-0 focus:outline-none transition-colors duration-200"
                            placeholder="john@company.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="far fa-envelope text-slate-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-sm text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.password')}}</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="form-input w-full px-4 py-3 text-slate-700 border border-slate-300 rounded-lg focus:ring-0 focus:outline-none transition-colors duration-200"
                            placeholder="••••••••">
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500 hover:text-slate-700"
                            data-hs-toggle-password='{
                                        "target": "#password"
                                    }'>
                            <i class="far fa-eye-slash text-slate-400"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                  <!-- Info Box -->
                @if (session('status'))
                <div class="border bg-blue-50 border-slate-200 rounded-lg py-3 px-4">
                      <p class="text-sm text-blue-700 flex items-center justify-center">
                        <svg class="w-4 h-4 mt-0.5 mr-2 flex-shrink-0 text-blue-500" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                            {{ session('status') }}
                    </p>
                </div>
                @endif

                <!-- Register Link -->
                <div class="mt-6 text-center text-sm text-slate-600 flex items-center justify-between">
                    <label for="remember" class="flex items-center justify-center gap-2">
                        <input type="checkbox" name="remember_me" id="remember">
                        <span class="font-medium">{{__('form-labels.remember_me')}}</span>
                    </label>
                    {!!__('form-labels.forgot_password_link', [
                        'url' => route('password.request')
                    ])!!}
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold bg-slate-800 text-white hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-800 focus:ring-offset-2 transition-all text-sm">
                    {{__('form-labels.login')}}
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center text-sm text-slate-600">
                {!!__('form-labels.create_account_link', [
                    'url' => route('register')
                ])!!}
            </div>
        </div>

        <!-- Footer -->
        <x-auth.footer />

    </section>

@endsection