@extends('layout.detail')

@section('content')

    <div  class="py-12 px-8 lg:px-32 bg-wrey">
        <!-- Main content -->
        <main class="z-0 w-full h-screen flex justify-center">
            <div class="container py-8 w-full">
                <h2 class="text-2xl font-bold mb-6">Kelola Poin Jurusan</h2>
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
            
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-center">
                            <th class="border-y-2 border-slate-700 py-2">No</th>
                            <th class="border-y-2 border-slate-700 py-2">Logo</th>
                            <th class="border-y-2 border-slate-700 py-2">Jurusan</th>
                            <th class="border-y-2 border-slate-700 py-2">Tanggal</th>
                            <th class="border-y-2 border-slate-700 py-2">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($poin as $d)
                            <tr class="text-center">
                                <td class="border-y-2 border-slate-700 py-2">{{ $loop->iteration }}</td>
                                <td class="border-y-2 border-slate-700 text-center align-middle">
                                    <img class="w-8 sm:w-10 rounded-full inline-block" src="{{ asset('image/'.$d->jurusan->gambar ) }}" alt="{{ $d->jurusan->jurusan }}">
                                </td> 
                                <td class="border-y-2 border-slate-700 py-2">{{ $d->jurusan->jurusan }}</td>
                                <td class="border-y-2 border-slate-700 py-2">{{ \Carbon\Carbon::parse($d->contributed_at)->format('Y-m-d') }}</td>
                                <td class="border-y-2 border-slate-700 py-2">{{ $d->poin }}<small class="text-red-600">kg</small></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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
                                <input type="number" id="editPoin" name="poin" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('point', $selectedItem->poin ?? '') }}" required>
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

@endsection