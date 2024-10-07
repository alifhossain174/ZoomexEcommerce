@php
    $socialShare = Share::page(url()->current(), env('APP_NAME'))
        ->facebook()
        ->twitter()
        ->linkedin(env('APP_NAME'))
        ->whatsapp()
        ->getRawLinks();
@endphp

<div class="social-links">
    <span style="display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px;">Share Now : </span>
    <div class="social-icons social-no-color border-thin">
        <a href="{{ $socialShare['facebook'] }}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
        <a href="{{ $socialShare['twitter'] }}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
        <a href="{{ $socialShare['whatsapp'] }}" target="_blank" class="social-icon social-whatsapp fab fa-whatsapp"></a>
        <a href="{{ $socialShare['linkedin'] }}" target="_blank" class="social-icon social-youtube fab fa-linkedin-in"></a>
    </div>
</div>
