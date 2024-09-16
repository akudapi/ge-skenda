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
    @vite('resources/css/app.css')
  	<link rel="stylesheet" href="{{ asset("../css/style.css") }}">
</head>
<body class="bg-gray-100 p-0 m-0 w-full h-full font-poppins">

    <div class="sm:grid sm:grid-cols-7 sm:w-full sm:h-screen">
        {{-- sidebar desktop --}}
        <aside id="sidebar" class="sm:col-span-1 hidden sm:inline shadow-md">
            <div class=" h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('index','#peringkat') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                    <hr>
                    <li>
                        <a href="#user" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">User Table</span>
                        </a>
                    </li>
                    <li>
                        <a href="#peringkat" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Peringkat Table</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <!-- header mobile -->
        <header class="w-full z-30 py-3 px-5 lg:px-52 dark:bg-gray-800 text-white shadow-md backdrop-blur sm:hidden">
            <div class="container mx-auto grid grid-cols-3 col-auto items-center">
                <div class="font-bold flex items-center col-span-2 lg:col-span-1">
                    <a href="{{ route('index') }}"><img class="size-10 mr-2.5" src="{{ asset("../image/ge-green.png") }}" alt="icon header"></a>
                    <a href="{{ route('index') }}"><p class="font-merriweather text-lg">Admin Page</p></a>
                </div>
                <!-- Icon menu mobile -->
                <div class="lg:hidden sm:col-span-1 flex justify-end">
                    <button id="menu-toggle" class="text-2xl focus:outline-none">
                    &#9776;
                    </button>
                </div>
                 <!-- popup menu mobile -->
                <div id="mobile-menu" class="hidden lg:hidden transition transform origin-top py-2.5 grid col-span-3 gap-2">
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

        <main class="sm:col-span-6 w-full">

            <div class="container m-auto py-12 w-full">
                <h2 class="text-2xl font-bold mb-6">Kelola Poin Jurusan</h2>
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
            
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-center">
                            <th class="border-y-2 border-slate-700 py-2">No</th>
                            <th class="border-y-2 border-slate-700 py-2">Jurusan</th>
                            <th class="border-y-2 border-slate-700 py-2">Tanggal</th>
                            <th class="border-y-2 border-slate-700 py-2">Poin</th>
                            <th class="border-y-2 border-slate-700 py-2 sm:w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($poin as $d)
                            <tr class="text-center">
                                <td class="border-y-2 border-slate-700 py-2">{{ $loop->iteration }}</td>
                                <td class="border-y-2 border-slate-700 py-2">{{ $d->jurusan->jurusan }}</td>
                                <td class="border-y-2 border-slate-700 py-2">{{ \Carbon\Carbon::parse($d->contributed_at)->format('Y-m-d') }}</td>
                                <td class="border-y-2 border-slate-700 py-2">{{ $d->poin }}</td>
                                <td class="border-y-2 border-slate-700 py-2">
                                    <button onclick="openEditModal({{ $d->id }}, '{{ $d->jurusan->jurusan }}', {{ $d->poin }})" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded">Edit</button>
                                    <button onclick="openDeleteModal('{{ route('admin.delete', $d->id) }}')" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <!-- Modal Edit -->
                {{-- <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-xl font-semibold mb-4 text-gray-700">Edit Poin Jurusan</h2>
                        <form action="{{ route('admin.edit') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="editId" name="id">
                            <div class="mb-4">
                                <label for="editJurusan" class="block text-base font-medium text-gray-700">Jurusan</label>
                                <input type="text" id="editJurusan" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('jurusan', $selectedItem->jurusan ?? '') }}" disabled>
                            </div>
                            <div class="mb-4">
                                <label for="editTanggal" class="block text-base font-medium text-gray-700">Tanggal</label>
                                <input type="date" id="editTanggal" name="contributed_at" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('contributed_at', $selectedItem->contributed_at ?? '') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="editPoint" class="block text-base font-medium text-gray-700">Poin</label>
                                <input type="number" id="editPoin" name="point" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('point', $selectedItem->poin ?? '') }}" required>
                            </div>
                            <div class="flex justify-end space-x-3">
                                <button type="button" onclick="closeModal('editModal')" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Close</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div> --}}


                <!-- Modal Edit -->
                <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-xl mb-4">Edit Poin Jurusan</h2>
                        <form id="editForm" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="editId" name="id">
                            <div class="mb-4">
                                <label for="editPoint" class="block text-base font-medium text-gray-700">Poin</label>
                                <input type="number" id="editPoin" name="point" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('point', $selectedItem->poin ?? '') }}" required>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
                            <button type="button" onclick="closeEditModal()" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Cancel</button>
                        </form>
                    </div>
                </div>

                <!-- Modal Delete -->
                <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
                    <div class="bg-white p-5 rounded-lg shadow-lg">
                        <h2 class="text-xl mb-4">Konfirmasi Hapus</h2>
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
                            <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Batal</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
 
    <script src="{{ asset("../js/script.js") }}"></script>
</body>
</html>
