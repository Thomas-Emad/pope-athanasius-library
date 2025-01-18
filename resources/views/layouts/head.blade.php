<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- prettier-ignore -->
<title>{{ ($title ) . ' | ' . config('app.name', 'Laravel') }}</title>

<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
