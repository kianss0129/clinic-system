<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <!-- Only load reCAPTCHA for registration page -->
        @if (request()->is('register/patient'))
            <!-- Load reCAPTCHA API Script -->
            <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
        @endif
    </head>
    <body class="font-sans antialiased">
        @inertia
        
        <!-- Only load reCAPTCHA on registration page -->
        @if (request()->is('register/patient'))
            <!-- reCAPTCHA Execution Script -->
            <script>
                window.onload = function() {
                    // Ensure the element exists before trying to render reCAPTCHA
                    var captchaElement = document.getElementById('captcha');
                    
                    if (captchaElement && typeof grecaptcha !== 'undefined') {
                        // Check if reCAPTCHA is already rendered to avoid re-initialization
                        if (!grecaptcha.getResponse()) {
                            grecaptcha.ready(function () {
                                grecaptcha.render(captchaElement, {
                                    sitekey: '{{ config('no-captcha.sitekey') }}',
                                    callback: function(response) {
                                        let input = document.createElement('input');
                                        input.type = 'hidden';
                                        input.name = 'g-recaptcha-response';
                                        input.value = response;
                                        document.querySelector('form').appendChild(input);
                                    }
                                });
                            });
                        }
                    }
                }
            </script>
        @endif
    </body>
</html>
