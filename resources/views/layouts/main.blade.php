<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex-items-center justify-between px-4 py-6 ">
            <ul class="flex items-center">
                <li>
                    <a href="#">
                        <img src="" alt="" class="w-32">
                        Logo Here
                    </a>
                </li>
                <li class="ml-16">
                    <a href="#" class="hover:text-gray-300"> Movies</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300"> TV Shows</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300"> Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text"
                        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Type to Search">
                    {{-- <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
                            <path class="heroicon-ui"
                                d="M16.32 14.915.39 5.4a1 1 0 01-1.42 1.41-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 00012z" />
                        </svg>
                    </div> --}}
                </div>
                <div class="ml-4">
                    <a href="#">
                        <img src="" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
