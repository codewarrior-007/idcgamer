@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', [
    'url' => $header_url,
    'image' => $header_image,

])
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
<img class="footer-logo" width="300" src="{{ asset('img/emails/symmetry-logo.png') }}" alt="Symmetry Financial Group Logo">
<p>&copy; {{ date('Y') }} Symmetry Financial Group</p>
@endcomponent
@endslot
@endcomponent
