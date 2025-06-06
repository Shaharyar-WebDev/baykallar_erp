<!-- Logo -->
<a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80"
    href="{{route('home.index')}}" aria-label="{{$settings['site.name']}}" title="{{$settings['site.name']}}">
    <img src="{{asset('storage/'.$settings['site.logo'])}}" style="width: {{ $settings['site.logo_width'] ? $settings['site.logo_width'].'px' : '120px'}}; height: {{ $settings['site.logo_height'] ? $settings['site.logo_height'].'px' : ''}}" alt="{{$settings['site.name']}}">
</a>
<!-- End Logo -->