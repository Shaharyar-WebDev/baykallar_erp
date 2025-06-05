@extends('components.layouts.auth-layout')

@section('title', 'Verify email')

@section('main')

    <section id="verify-email" class="glass-card w-full max-w-md rounded-xl overflow-hidden">
        <div class="p-8">
            <!-- Header with Email Icon -->
            <x-auth.header>
                <div class="bg-blue-50 border border-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-mail-icon lucide-mail">
                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                        <rect x="2" y="4" width="20" height="16" rx="2" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800">{{__('form-labels.verify_email')}}</h1>
            </x-auth.header>

            <!-- Verification Content -->
            <div class="space-y-5">
                <div class="text-center">
                    <p class="text-slate-600 mb-4">
                        @if(session('status') === 'verification-link-sent')
                            {!!__('form-labels.email_sent_message', [
                                'email' => auth()->user()->email 
                            ])!!}
                        @else
                      {!!__('form-labels.send_email_message', [
                        'email' =>  auth()->user()->email 
                      ])!!}
                        @endif
                    </p>

                <!-- Info Box -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg py-3 px-4 mb-6">
                        <p class="text-sm text-blue-700 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                           {{__('form-labels.check_spam')}}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <form method="POST" action="{{ route('verification.send') }}" class="space-y-3">
                    @csrf
                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold bg-slate-800 text-white hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-800 focus:ring-offset-2 transition-all text-sm">
                        @if(session('status') === 'verification-link-sent')
                           {{__('form-labels.send_email')}}
                        @else
                             {{__('form-labels.resend_email')}}
                        @endif
                    </button>

                </form>
            </div>

        </div>

        <x-auth.footer />


    </section>

@endsection