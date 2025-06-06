@props([
    'errors'
])

@error($errors)
<span class="text-red-500">
    {{$message}}
</span>
@enderror