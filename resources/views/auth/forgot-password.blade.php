@extends('components.layouts.auth-layout')

@section('title', 'Forgot password')

@section('main')

    <section id="forgot-password" class="glass-card w-full max-w-md rounded-xl overflow-hidden">
        <div class="p-8">
            <!-- Header with Lock Icon -->

            <x-auth.header>
                <div class="bg-blue-50 border border-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-icon lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800">{{__('form-labels.forgot_password_title')}}</h1>
                <p class="text-slate-500 mt-1">{{__('form-labels.forgot_password_subtitle')}}</p>
            </x-auth.header>

            <!-- Password Reset Form -->
            <form class="space-y-5" action="{{ route('password.email') }}" method="POST">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="reset-email" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.email_address')}}</label>
                    <div class="relative">
                        <input type="email" id="reset-email" name="email" value="{{old('email')}}"
                            class="form-input w-full px-4 py-3 text-slate-700 border border-slate-300 rounded-lg focus:ring-0 focus:outline-none transition-colors duration-200"
                            placeholder="john@company.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="far fa-envelope text-slate-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <!-- Info Box -->
                <div class="border bg-blue-50 border-slate-200 rounded-lg py-3 px-4">
                      <p class="text-sm text-blue-700 flex items-center justify-center">
                        <svg class="w-4 h-4 mt-0.5 mr-2 flex-shrink-0 text-blue-500" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        @if (session('status'))
                            {{ session('status') }}
                        @else
                        {{__('form-labels.reset_link_info', [
                            'min' => 30
                        ])}}
                        @endif
                    </p>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold bg-slate-800 text-white hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-800 focus:ring-offset-2 transition-all text-sm">
                    {{__('form-labels.send_reset_link')}}
                </button>
            </form>

            <!-- Back to Login -->
            <div class="mt-6 text-center text-sm text-slate-600">
                {{__('form-labels.remember_password')}}
               {!!__('form-labels.login_instead', [
                'url' => route('login')
               ])!!}
            </div>
        </div>

        <x-auth.footer/>

    </section>

@endsection