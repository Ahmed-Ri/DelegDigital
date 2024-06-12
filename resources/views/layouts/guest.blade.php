<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>L'assistant Digital</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <style>
        body,
        .min-h-screen {
            background-color: #acbccb !important;
            /* Change le fond en rouge */
        }
    </style> --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">


        {{-- <style>
            .custom-bg-color {
                background-color: #d2d9ed;
                /* Ou toute autre couleur de votre choix */
            }
        </style> --}}

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg custom-bg-color">
            {{-- <div>
                <img src="assets/images/logo1.png"
                    alt="Description de l'image"style="margin-left: 30px;margin-bottom: 30px;">
            </div> --}}
            {{ $slot }}
        </div>

    </div>
</body>

</html>
