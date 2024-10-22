@extends('layout.admin')

@section('content')

    <div  class="md:col-span-6 overflow-auto">
        <!-- Main content -->
        <main class="z-0 w-full h-screen flex justify-center">
            <div class="container md:p-8 p-4 w-full">
                <h1 class="text-center text-2xl mb-4 font-bold">Dana Beasiswa Sampah</h1>
                {{-- card --}}
                <div class="flex flex-col justify-center items-center gap-2 div h-[8em] w-[15em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0">
                    <h1 class="z-20 font-bold font-Poppin duration-500 text-[1.4em]">
                        Rp. {{ number_format(auth()->user()->dana, 0, ',', '.') }}
                    </h1>
                    
                    <form action="{{ route('updateDana') }}" method="POST">
                        @csrf
                        <input type="number" name="dana" class="w-full bg-wrey border-2" value="{{ auth()->user()->dana }}" required>
                        <button type="submit" class="bg-black text-white py-1 px-2 rounded-md mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

@endsection