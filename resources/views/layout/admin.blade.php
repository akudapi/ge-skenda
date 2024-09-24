<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beasiswa Sampah</title>

  	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    {{-- tailwind css --}}
	<link rel="stylesheet" href="{{ asset('build/assets/app-9kXum9lR.css') }}">
	{{-- css --}}
	<link rel="stylesheet" href="{{ asset("css/style.css") }}">

</head>
<body class="bg-gray-100 p-0 m-0 w-full h-full font-poppins">

    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-7 w-full h-full">
        {{-- sidebar desktop --}}
        <aside id="sidebar" class="xl:col-span-1 hidden xl:block z-10 shadow-md">
            <div class="fixed w-[272px] h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('index','#peringkat') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('admin.poin') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Peringkat Table</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">User Table</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </aside>
        
        <!-- header mobile dan layar sedang (MD) -->
        <header class="w-full z-30 py-3 px-5 dark:bg-gray-800 text-white shadow-md backdrop-blur 2xl:hidden">
            <div class="container mx-auto grid grid-cols-2 col-auto items-center">
                <div class="font-bold flex items-center ">
                    <a href="{{ route('index') }}"><img class="size-10 mr-2.5" src="{{ asset("../image/ge-green.png") }}" alt="icon header"></a>
                    <a href="{{ route('index') }}"><p class="font-merriweather text-lg">Admin Page</p></a>
                </div>
                <!-- Icon menu mobile -->
                <div class=" flex justify-end">
                    <button id="menu-toggle" class="text-2xl focus:outline-none">
                    &#9776;
                    </button>
                </div>
                <!-- popup menu mobile -->
                <div id="mobile-menu" class="hidden transition transform origin-top py-2.5 grid col-span-3 gap-2">
                    <a href="#about" class="flex justify-start w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">User</a>
                    <a href="#program" class="flex justify-start w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Peringkat</a>
                    @if(Auth::user())
                        <form id="logout-form" action="{{ route("logout") }}" method="GET">
                            @csrf
                            <button type="submit" class="flex justify-start w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Logout <small class="text-red-400">({{ Auth::user()->name }})</small></button>
                        </form>
                    @else
                        <a onclick="toggleModalLogin()" class="block py-2 px-4 text-sm ">Login</a>
                    @endif
                </div>
            </div>
        </header>

        @yield('content')
        
    </div>
        
	<script src="{{ asset('build/assets/app-CEsE5a7F.js') }}"></script>
    <script src="{{ asset("js/script.js") }}"></script>
    
</body>

</html>