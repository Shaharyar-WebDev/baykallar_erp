@extends('components.layouts.auth-layout')

@section('title', 'Register')

@section('main')

    <section id="login" class="glass-card w-full max-w-md rounded-xl overflow-hidden">
        <div class="p-8">

            <!-- Header -->
            <x-auth.header />

            <!-- Registration Form -->
            <form class="space-y-5" action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Full Name -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-slate-700 mb-1">{{ __('form-labels.full_name') }}</label>
                    <div class="relative">
                        <input type="text" id="fullname" name="name" required value="{{old('name')}}"
                            class="form-input w-full px-4 py-3 text-slate-700 border border-slate-300 rounded-lg focus:ring-0 focus:outline-none transition-colors duration-200"
                            placeholder="John Smith">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="far fa-user text-slate-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <span class="text-sm text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.email')}}</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required value="{{old('email')}}"
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
                        <input type="password" id="password" name="password" required
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

                <!-- Confirm Password -->
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-slate-700 mb-1">{{__('form-labels.confirm_password')}}</label>
                    <div class="relative">
                        <input type="password" id="confirm-password" name="password_confirmation" required
                            class="form-input w-full px-4 py-3 text-slate-700 border border-slate-300 rounded-lg focus:ring-0 focus:outline-none transition-colors duration-200"
                            placeholder="••••••••">
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500 hover:text-slate-700"
                            data-hs-toggle-password='{
                                        "target": "#confirm-password"
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

                <!-- Terms & Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required
                            class="w-4 h-4 border border-slate-300 rounded bg-slate-50 focus:ring-2 focus:ring-blue-300">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-slate-700">
                            {!!__('form-labels.accept_terms', [
                                'url' => '/register'
                            ])!!}
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold bg-slate-800 text-white hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-800 focus:ring-offset-2 transition-all text-sm">
                    {{__('form-labels.register_account')}}
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center text-sm text-slate-600">
                {!!__('form-labels.login_instead', [
                    'url' => route('login')
                ])!!}
            </div>
        </div>

        <!-- Footer -->
        <x-auth.footer />
    </section>

@endsection