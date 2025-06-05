@extends('components.layouts.auth-layout')

@section('title', 'Reset password')

@section('main')

    <section id="reset-password" class="glass-card w-full max-w-md rounded-xl overflow-hidden">
        <div class="p-8">
            <!-- Header with Lock Icon -->

            <x-auth.header>
                <div class="bg-blue-50 border border-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-icon lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800">{{__('form-labels.reset_password_title')}}</h1>
            </x-auth.header>

            <!-- Password Reset Form -->
            <form class="space-y-5" action="{{ route('password.update') }}" method="POST">
                
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Field -->
                <div>
                    <label for="reset-email" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.email_address')}}</label>
                    <div class="relative">
                        <input type="email" id="reset-email" name="email" value="{{old('email', $request->email)}}"
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

                 <!-- Password Field -->
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

                 <!-- Confirm Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.confirm_password')}}</label>
                    <div class="relative">
                        <input type="password" id="confirm-password" name="password_confirmation"
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
                    @error('password_confirmation')
                        <span class="text-sm text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold bg-slate-800 text-white hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-800 focus:ring-offset-2 transition-all text-sm">
                    {{__('form-labels.reset_password_button')}}
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