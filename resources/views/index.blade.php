<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>RCCG | Nehemiah's Palance Parish</title>
    <meta property="og:title" content="RCCG | Nehemiah's Palance Parish" />
    <meta property="og:description" content="Welcome to The Redeemed Christian Church of Go, Nehemiah's Palance Parish" />
    <meta property="og:url" content="https://nehemiahs.co.uk" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="32x32">

    @vite(['resources/scss/main.scss', 'resources/js/main.js'])

    <script>
        window.AppConfig = {
            name: '{{ env('APP_NAME') }}',
            logo: '{{ env('APP_LOGO') }}',
            url: '{{ env('APP_URL') }}',
            csrf: '{{ csrf_token() }}',
            defaultLocale: '{{ env('APP_LOCALE', 'en') }}',
            defaultTimezone: '{{ env('APP_TIMEZONE', 'UTC') }}',
            locales: {
                en: {!! json_encode(\Illuminate\Support\Facades\Lang::get('frontend', [], 'en')) !!},
                mk: {!! json_encode(\Illuminate\Support\Facades\Lang::get('frontend', [], 'mk')) !!},
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
</head>

<body class="font-roboto">
    <noscript>
        <strong>We're sorry but this application doesn't work properly without JavaScript enabled. Please enable it to
            continue.</strong>
    </noscript>

    <div id="app"></div>

</body>

</html>
