@extends('layout.main')


@section('content')

		<!-- Hero Section -->
		<section id="home" class="relative w-full h-screen bg-cover bg-center lg:px-32 px-8" style="background-image: url({{ asset('../image/bg-image.jpg') }});">
			<div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
			<div class="relative z-20 flex flex-col justify-center h-full text-white">
				<div class="lg:grid lg:grid-cols-5 flex flex-col-reverse">
					<div class="lg:col-span-3">
						<div class="flex flex-col font-bold text-center lg:mt-10">
							<h1 class="lg:text-8xl lg:-rotate-6 text-5xl">BEASISWA</h1>
							<h1 class="lg:text-8xl lg:ml-48 text-5xl">SAMPAH</h1>
						</div>
						<div>
							<p class="lg:text-4xl text-2xl font-roadrage text-center">By <span class="text-green-500">Green Economy</span> & Pilah Sampah Banjarmasin</p>
						</div>
					</div>
					<div class="lg:col-span-2 flex justify-center">
						<img class="lg:size-72 size-60 mb-8 lg:mb-0" src="{{ asset("../image/leaf.png") }}" alt="LOGOOO">
					</div>
				</div>
			</div>
		</section>

		<!-- About Section -->
		<section id="about" class="py-8 lg:px-32 px-8 bg-wrey flex justify-center items-center">
			<div class="my-10 lg:grid lg:grid-cols-4 gap-6 container mx-auto">
				<div class="lg:col-span-1 flex justify-center items-center">
					<img class="" src="{{ asset("../image/tps.jpg") }}" alt="leaf">
				</div>
				<div class="lg:col-span-3">
					<h2 class="text-2xl font-bold lg:mb-8 lg:my-0 my-3">Tentang Kami</h2>
					<p class="text-md text-gray-700 w-full text-justify hyphens-auto">
						<strong>Green Economy</strong> Merupakan Komunitas dari SMKN 2 Banjarmasin yang berfokus pada penerapan prinsip Ekonomi Berkelanjutan dengan memprioritaskan kesejahteraan lingkungan, sosial, dan ekonomi secara holistik. Komunitas Green Economy bertujuan untuk menciptakan pendanaan baru di sekolah dengan memanfaatkan potensi sampah sekaligus meningkatkan kualitas hidup setiap individu di sekolah tanpa merusak ekosistem atau mengorbankan kebutuhan generasi mendatang.
					</p>
				</div>
			</div>
		</section>

		<!-- Form Section -->
		<section class="bg-black text-white py-12 text-center">
			<h1 class="font-extrabold text-3xl">JOIN OUR COMUNITY</h1>
			<a href="https://forms.gle/2Jpm3GMmeoCRn1uZA" class="mt-6 inline-block border hover:bg-white delay-75 duration-200 hover:text-black py-2.5 font-bold px-4 rounded-full">Registration Form</a>
		</section>

		<!-- Program Section -->
		<section id="program" class="py-12 px-8 lg:px-32 bg-wrey flex justify-center items-center">
			<div class="container lg:my-16 my-8">
				<h2 class="lg:text-3xl text-2xl font-bold mb-8">Program Kami</h2>
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
					<!-- CARD PROGRAM 1 -->
					<div class="bg-gray-300 shadow-md rounded-lg p-6 xl:h-64 w-full lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col-reverse overflow-hidden">
						<div class="lg:col-span-2">
							<h3 class="text-lg font-bold text-center lg:text-start my-2 lg:my-0 ">Pengelolaan Sampah Plastik</h3>
							<p class="text-sm lg:mt-2 text-justify hyphens-auto">Pilah Sampah merupakan program yang dibawa oleh komunitas green economy dengan tujuan meningkatkan kesadaran dan partisipasi warga sekolah dalam pengelolaan sampah dengan cara memisahkan sampah berdasarkan jenisnya. 
							</p>
							<div class="lg:hidden text-end mt-1">
								<a href="{{ route('pilah') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
						<div class="lg:col-span-1 lg:h-52 flex lg:flex-col items-center justify-center">
							<div class="lg:size-40 size-20 lg:absolute flex justify-center">
								<img src="{{ asset("../image/kelola.png") }}" alt="icon">
							</div>
							<div class="relative top-24 left-12 hidden lg:inline-block">
								<a href="{{ route('pilah') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
					</div>
					<!-- CARD PROGRAM 2 -->
					<div class="bg-gray-300 shadow-md rounded-lg p-6 xl:h-64 w-full lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col-reverse overflow-hidden">
						<div class="lg:col-span-2">
							<h3 class="text-lg font-bold text-center lg:text-start my-2 lg:my-0 ">Beasiswa Sampah</h3>
							<p class="text-sm lg:mt-2 text-justify hyphens-auto">Beasiswa Sampah merupakan progam yang dibawa oleh komunitas Green Economy dengan konsep pemanfaatan potensi sampah di lingkungan sekolah menjadi subsidi beasiswa untuk siswa/i yang kurang mampu. Dengan tujuan membantu dan mendorong kesadaran warga sekolah akan kebersihan lingkungan.</p>
							<div class="lg:hidden text-end mt-1">
								<a href="{{ route('beasiswa') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
						<div class="lg:col-span-1 lg:h-52 flex lg:flex-col items-center justify-center">
							<div class="lg:size-40 size-20 lg:absolute flex justify-center">
								<img src="{{ asset("../image/sampah.png") }}" alt="icon">
							</div>
							<div class="relative top-24 left-12 hidden lg:inline-block">
								<a href="{{ route('beasiswa') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
					</div>
					<!-- CARD PROGRAM 3 -->
					<div class="bg-gray-300 shadow-md rounded-lg p-6 xl:h-64 w-full lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col-reverse overflow-hidden">
						<div class="lg:col-span-2">
							<h3 class="text-lg font-bold text-center lg:text-start my-2 lg:my-0 ">Minyak Jelantah</h3>
							<p class="text-sm lg:mt-2 text-justify hyphens-auto">Program Minyak Jelantah merupakan program yang dibawa oleh Green Economy SMKN 2 dengan pemanfaatan limbah minyak goreng bekas. Tujuan program ini untuk mengurangi dampak negatif minyak jelantah terhadap lingkungan dan dimanfaatkan sebagai sumber daya yang lebih berharga.</p>
							<div class="lg:hidden text-end mt-1">
								<a href="{{ route('minyak') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
						<div class="lg:col-span-1 lg:h-52 flex lg:flex-col items-center justify-center">
							<div class="lg:size-40 size-20 lg:absolute flex justify-center">
								<img src="{{ asset("../image/minyak.png") }}" alt="icon">
							</div>
							<div class="relative top-24 left-12 hidden lg:inline-block">
								<a href="{{ route('minyak') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
					</div>
					<!-- CARD PROGRAM 4 -->
					<div class="bg-gray-300 shadow-md rounded-lg p-6 xl:h-64 w-full lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col-reverse overflow-hidden">
						<div class="lg:col-span-2">
							<h3 class="text-lg font-bold text-center lg:text-start my-2 lg:my-0 ">Pot Bunga Botol Plastik</h3>
							<p class="text-sm lg:mt-2 text-justify hyphens-auto">Program Penghijauan merupakan program yang dibawa oleh Green Economy SMKN 2 Banjarmasin yang berfokus pada penghijauan untuk lingkungan sekolah. Tujuan dari Program ini selain untuk penghijauan, juga dapat menjadi media estetika sekolah.</p>
							<div class="lg:hidden text-end mt-1">
								<a href="{{ route('pot') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
						<div class="lg:col-span-1 lg:h-52 flex lg:flex-col items-center justify-center">
							<div class="lg:size-40 size-20 lg:absolute flex justify-center">
								<img src="{{ asset("../image/pot.png") }}" alt="icon">
							</div>
							<div class="relative top-24 left-12 hidden lg:inline-block">
								<a href="{{ route('pot') }}" class="text-green-600 hover:underline text-sm hover:text-base duration-300 ">Detail ></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 

		<!-- Peringkat Section -->
		<section id="peringkat" class="py-12 px-8 lg:px-32 bg-wrey">
			<div class="lg:my-16 my-8">
				<h2 class="lg:text-3xl text-2xl font-bold mb-8">Peringkat Jurusan</h2>
				<div class="bg-white lg:py-12 p-6 lg:px-20 rounded-lg shadow-md">
					<div class="mb-5 sm:grid sm:grid-cols-4 flex flex-col gap-2">
						<h1 class="sm:col-span-1 text-lg sm:text-xl font-semibold">Table Peringkat</h1>
						<div class="sm:col-span-3 sm:grid sm:justify-end gap-2">
							{{-- resources/views/peringkat/index.blade.php --}}
							<form method="GET" action="{{ route('index', '#peringkat') }}" class="grid grid-rows-2 gap-2 sm:flex">
								<div class="grid grid-cols-4 sm:gap-2 sm:items-center">
									<label for="month">Bulan:</label>
									<select name="month" id="month" class="border-2 border-solid rounded-md col-span-3">
										<option value="">Semua Bulan</option>
										@foreach ($months as $num => $name)
											<option value="{{ $num }}" {{ $num == request('month') ? 'selected' : '' }}>
												{{ $name }}
											</option>
										@endforeach
									</select>
								</div>

								<div class="grid grid-cols-4 sm:gap-2">
									<label for="year">Tahun:</label>
									<select name="year" id="year" class="border-2 border-solid rounded-md col-span-3">
										<option value="">Semua Tahun</option>
										@foreach ($years as $y)
											<option value="{{ $y }}" {{ $y == request('year') ? 'selected' : '' }}>
												{{ $y }}
											</option>
										@endforeach
									</select>
								</div>

								<button type="submit" class="border border-black text-black hover:bg-black hover:text-white duration-300 lg:py-1 font-bold lg:px-3 rounded-full text-sm p-1 px-2">Filter</button>
							</form>

						</div>
					</div>

					<table id="example" class="w-full table-auto">
						<thead class="tableHead">
							<tr>
								<th class="border-y-2 border-slate-700 py-2 text-center w-8">No</th>
								<th class="border-y-2 border-slate-700 py-2 w-10 sm:w-20">Logo</th>
								<th class="border-y-2 border-slate-700 py-2">Jurusan</th>
								<th class="border-y-2 border-slate-700 py-2 text-center sm:w-20">Poin</th>
							</tr>
						</thead>
						<tbody id="tableBody">
							@foreach ($data as $d)
								<tr>
									<td class="border-y-2 py-3 border-slate-700 text-center">{{ $loop->iteration }}.</td>
									<td class="border-y-2 border-slate-700 text-center align-middle">
										<img class="w-8 sm:w-10 rounded-full inline-block" src="{{ asset('image/'.$d->jurusan->gambar ) }}" alt="LAMBANG JURUSAN">
									</td> 
									<td class="border-y-2 py-3 border-slate-700 text-sm text-center sm:text-lg sm:text-start">{{ $d->jurusan->jurusan }}</td>
									<td class="border-y-2 py-3 border-slate-700 text-center">
										{{ $month && $year ? $d->poin : $d->total_poin }}<small class="text-red-400">kg</small>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>


					<div class="grid grid-cols-2 mt-3">
						<div class="col-span-1">
							@if(Auth::user())
								<button onclick="toggleModalPoint()" class="border border-black text-black hover:bg-black hover:text-white duration-300 lg:py-1 font-bold lg:px-3 rounded-full text-sm p-1 px-2">
									Point Submission
								</button>
							@endif
						</div>
						<div class="col-span-1 text-end">
							<div class="text-sm text-gray-600">
								@if($month && $year)
									<h3>Menampilkan data untuk bulan: {{ \Carbon\Carbon::createFromDate(null, $month, 1)->format('F') }} {{ $year }}</h3>
								@else
									<span class="hidden lg:inline">Point terakhir diperbarui: </span>
									{{ $lastUpdate ? $lastUpdate->format('d F Y') : 'Belum ada data' }}
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Popup Form Point -->
			<div id="pointFormModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-50 flex items-center justify-center">
				<div class="bg-white p-6 rounded-lg shadow-lg w-96">
					<h2 class="text-xl font-semibold mb-4 text-gray-700">Form Point Submission</h2>
					<hr class="border-t-2 border-gray-200 mb-4">
					<form action="{{ route('point-proses') }}" method="POST">
						@csrf

						<div class="mb-4">
							<label for="jurusan" class="block text-base font-medium text-gray-700">
								Jurusan: <span class="text-red-500">*</span>
							</label>
							<select name="jurusan" id="jurusan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
								<option value="#" selected>Pilih Jurusan</option>
								@foreach ($jurusan as $j)
									<option value="{{ $j->id }}">{{ $j->jurusan }}</option>
								@endforeach
							</select>
						</div>

						<div class="mb-4">
							<label for="point" class="block text-base font-medium text-gray-700">
								Tambah Point: <span class="text-red-500">*</span>
							</label>
							<input type="number" id="point" name="point" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						</div>
					
						<div class="flex justify-end space-x-3">
							<button type="button" onclick="toggleModalPoint()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
								Close
							</button>
							<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section id="contact" class="lg:px-32 px-8 py-12 lg:py-32 bg-wrey">
			<div class="container my-2 lg:my-0">
				<h2 class="text-3xl font-bold mb-8">Kontak Kami</h2>
				<div>
					<div class="lg:col-span-1 row-span-1">
						<div class="text-left space-y-2 w-full">
							<p class="bg-gray-200 py-2 px-2 shadow-md rounded-lg"><strong>Email:</strong> greeneconomysmkn2bjm@gmail.com</p>
							<p class="bg-gray-200 py-2 px-2 shadow-md rounded-lg"><strong>Instagram:</strong> @greeneconomysmkn2bjm</p>
						</div>
					</div>
					{{-- <div class="lg:col-span-1 row-span-2">
						<form class="space-y-4">
							<input type="text" placeholder="Nama" class="w-full p-3 border border-gray-300 rounded-lg">
							<textarea placeholder="Pesan atau pertanyaan yang ingin disampaikan" class="w-full p-3 border border-gray-300 rounded-lg h-32"></textarea>
							<button type="submit" class="w-full border border-black bg-white hover:bg-black text-black hover:text-white font-bold py-3 px-6 rounded-lg">Send Message</button>
						</form>
					</div> --}}
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer class="bg-black text-white py-16 text-center">
			<p class="text-xl">© GE. All rights reserved (2024)</p>
		</footer>

@endsection