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

	<div>
		
		<!-- Sticky Header -->
		<header class="fixed w-full z-30 py-3 px-5 sm:px-52 header-white backdrop-blur">
			<div class="container mx-auto grid grid-cols-4 col-auto items-center">
				<div class="font-bold flex items-center col-span-3 sm:col-span-1">
					<a href="{{ route('index') }}"><img class="size-10 mr-2.5" src="{{ asset("../image/ge-green.png") }}" alt="icon header"></a>
					<a href="{{ route('index') }}"><p class="font-merriweather text-lg">Beasiswa Sampah</p></a>
				</div>
				<nav class="header-nav col-span-2 hidden gap-1 sm:flex sm:justify-center">
					<a href="{{ route('index','#about') }}" class="nav-link rounded-full px-3 py-1.5">About</a>
					<a href="{{ route('index','#program') }}" class="nav-link rounded-full px-3 py-1.5">Program</a>
					<a href="{{ route('index','#peringkat') }}" class="nav-link rounded-full px-3 py-1.5">Peringkat</a>
					<a href="{{ route('index','#contact') }}" class="nav-link rounded-full px-3 py-1.5">Contact</a>
				</nav>
				
				@if(Auth::user())
					<div class="col-span-1 justify-end hidden sm:flex relative">
						<button onclick="toggleDropdown()" class="py-2 px-4 rounded-full flex items-center">
							{{ Auth::user()->name }}
						</button>
					</div>
				@else
					<div class="col-span-1 justify-end hidden sm:flex">
						<button onclick="toggleModalLogin()" class="py-2 px-4 rounded-full flex items-center hover:bg-gray-300 hover:bg-opacity-20">
							Login
						</button>
					</div>
				@endif
				<!-- Icon menu mobile -->
				<div class="sm:hidden sm:col-span-1 flex justify-end">
					<button id="menu-toggle" class="text-2xl focus:outline-none">
					  &#9776;
					</button>
				</div>
			</div>
			
			{{-- popup menu mobile --}}
			<div id="mobile-menu" class="hidden sm:hidden transition transform origin-top py-2.5 grid gap-2">
				<a href="{{ route('index','#about') }}" class="block py-2 px-4 text-sm ">About</a>
				<a href="{{ route('index','#program') }}" class="block py-2 px-4 text-sm ">Program</a>
				<a href="{{ route('index','#peringkat') }}" class="block py-2 px-4 text-sm ">Peringkat</a>
				<a href="{{ route('index','#contact') }}" class="block py-2 px-4 text-sm ">Kontak</a>
				@if(Auth::user())
					<form id="logout-form" action="{{ route("logout") }}" method="GET">
						@csrf
						<button type="submit" class="w-full text-start block py-2 px-4 text-sm ">Logout <small class="text-red-400">({{ Auth::user()->name }})</small></button>
					</form>
				@else
					<a onclick="toggleModalLogin()" class="block py-2 px-4 text-sm ">Login</a>
				@endif
			</div>
		</header>

		<!-- Logout Button -->
		<div id="dropdownMenu" class="hidden fixed right-52 top-20 z-50 flex items-center justify-center">
			<a href="#" 
			onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
			class="text-sm px-4 py-2 rounded-md shadow-lg bg-white hover:bg-black border-2 border-black duration-300 text-gray-700 hover:text-white">
				Logout
			</a>
			<form id="logout-form" action="{{ route("logout") }}" method="GET" class="hidden">
				@csrf
			</form>
		</div>
		<!-- Popup Form Login -->
		<div id="loginFormModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-50 flex items-center justify-center">
			<div class="bg-white p-6 rounded-lg shadow-lg w-96">
				<h2 class="text-xl font-semibold mb-4 text-gray-700">Form Login</h2>
				<hr class="border-t-2 border-gray-200 mb-4">
				<form action="{{ route('login-proses') }}" method="POST">
					@csrf
					<div class="mb-4">
						<label for="username" class="block text-base text-gray-700 font-semibold mb-1">Username:</label>
						<input type="text" name="username" id="username" placeholder="Masukan username" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					</div>
					<div class="mb-6 relative">
						<label for="password" class="block text-base text-gray-700 font-semibold mb-1">Password:</label>
						<div class="relative">
							<input type="password" name="password" id="password" placeholder="Masukan password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
							<!-- Eye Icon inside the input field -->
							<button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
								<svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
									<circle cx="12" cy="12" r="3"></circle>
								</svg>
							</button>
						</div>
					</div>
					<div class="flex justify-end space-x-3">
						<button type="button" onclick="toggleModalLogin()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">Close</button>
						<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Submit</button>
					</div>
				</form>
			</div>
		</div>

        @yield('content')

	</div>
	
	<script src="{{ asset('build/assets/app-CEsE5a7F.js') }}"></script>
    <script src="{{ asset("js/script.js") }}"></script>

</body>
</html>
