<!-- Header with Logo or Slot -->
<div class="flex flex-col items-center mb-8 text-center">
    @if(trim($slot))
        {{ $slot }}
    @else
        <img 
            src="{{ asset('storage/'.$settings['site.logo']) }}" 
            alt="{{ $settings['site.name'] }} Logo"
            style="width: {{ $settings['auth.logo_width'] ? $settings['auth.logo_width'].'px' : '120px'}}; height: {{ $settings['auth.logo_height'] ? $settings['auth.logo_height'].'px' : ''}}"
            class="mb-4" 
            loading="lazy"
        >
        <h1 class="text-2xl font-bold text-slate-800">{{ $settings['site.name'] }}</h1>
        <p class="text-slate-500 mt-1">{{__('form-components.welcome')}}</p>
    @endif
</div>
<x-auth.menu/>