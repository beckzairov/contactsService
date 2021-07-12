<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact CRM</title>
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        nav li span{
            display: none;
        }
        @media only screen and (min-width: 912px){
            nav:hover{
                width: 16rem;
            }
            nav:hover li span{
                display: block;
            }
        }
        nav li a{
            transition: 0.5s;
            filter: grayscale(100%) opacity(0.7); 
        }
        nav li a:hover{
            background-color: #3B82F6;
            transition: 0.5s;
            filter: grayscale(0%) opacity(1);
            color: white;
        }
        nav li form button{
            transition: 0.5s;
            filter: grayscale(100%) opacity(0.7);
        }
        nav li form button:hover{
            background-color: #EF4444;
            transition: 0.5s;
            filter: grayscale(0%) opacity(1);
            color: white;
        }
    </style>
</head>
<body class="bg-gray-200">
    <nav class="w-20 h-full fixed bg-gray-100 transition-all ease-out duration-200">
        <ul class="flex flex-col justify-center h-full">
            @auth
                <li class="text-gray-500 hover:text-white hover:bg-blue-500 hover:rounded-lg">
                    <a href="{{ route('dashboard.index') }}" class="flex items-center h-20 hover:no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-8 mx-6 my-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Главный</span>
                    </a>
                </li>
                <li class="text-gray-500 hover:text-white hover:bg-blue-500 hover:rounded-lg">
                    <a href="" class="flex items-center h-20 hover:no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-8 mx-6 my-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                </li>
                <li class="text-gray-500 hover:text-white hover:bg-blue-500 hover:rounded-lg">
                    <a href="{{ route('favorites.index') }}" class="flex items-center h-20 hover:no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-8 mx-6 my-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <span>Избранное</span>
                    </a>
                </li>
                <li class="text-gray-500 hover:text-white hover:bg-blue-500 hover:rounded">
                    <a href="{{ route('contacts.index') }}" class="flex items-center h-20 hover:no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-8 mx-6 my-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span>Добавить новый клиент</span>
                    </a>
                </li>
                <li class="mt-auto h-20 text-gray-500 flex">
                    <form action="{{ route('logout') }}" class="flex w-full h-full" method="post">
                        @csrf
                        <button type="submit" class="flex items-center w-full h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-8 mx-6 my-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
    <main class="ml-20 pt-10">
        <div id="app">
            @yield('content')
        </div>   
    </main>
    <script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>