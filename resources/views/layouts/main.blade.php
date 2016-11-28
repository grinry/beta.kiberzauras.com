<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="p:domain_verify" content="{{ config('web.domain_verify') }}"/>
    <meta name="google-site-verification" content="{{ config('web.google_site_verification') }}" />
    <script>
        window.Laravel = {csrfToken: '{{ csrf_token() }}'};
    </script>
</head>
<body>
<header>
    <h1>
        Kiberzauras
        <span>apply for app beta<br>testing program</span>
    </h1>
</header>
<section class="app">
    <div class="film"></div>
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
</section>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ config('web.google_analytics_id') }}', 'auto');
    ga('send', 'pageview');
</script>
<script src="{{ asset('js/app.js') }}" language="javascript"></script>
</body>
</html>