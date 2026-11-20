<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elegance - Beauty Parlour</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
    <!-- Aapki Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- 1. HEADER YAHAN AAYEGA -->
    @if(Request::is('/'))
        @include('partials.header') 
    @else
        @include('partials.second_header') 
    @endif

    <!-- 2. MAIN CONTENT -->
    <main>
        @yield('content') 
    </main>

    <!-- 3. FOOTER YAHAN AAYEGA -->
    @include('partials.footer')

</body>
</html>