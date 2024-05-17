<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:shawdo-gray-700">
        <p class="text-center font-semibold text-lg">Edit Data Mahasiswa</p>
        <form action="{{ route('admin.update', $mahasiswa->nim) }}" method="POST" class="mt-5 max-w-xl">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap" required />
                </div>
                <div class="mb-5">
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                    <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIM" required />
                </div>
            </div>

            <div class="mb-5">
                <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900">Pilih Jurusan</label>
                <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option {{ $mahasiswa->jurusan == 'Komputer Dan Bisnis' ? 'selected' : '' }}>Komputer Dan Bisnis</option>
                    <option {{ $mahasiswa->jurusan == 'Rekayasa Mesin Dan Industri Pertanian' ? 'selected' : '' }}>Rekayasa Mesin Dan Industri Pertanian</option>
                    <option {{ $mahasiswa->jurusan == 'Rekayasa Elektro Dan Mekatronika' ? 'selected' : '' }}>Rekayasa Elektro Dan Mekatronika</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900">Pilih Program Studi</label>
                <select id="prodi" name="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option {{ $mahasiswa->prodi == 'D3 - Teknik Informatika' ? 'selected' : '' }}>D3 - Teknik Informatika</option>
                    <option {{ $mahasiswa->prodi == 'D3 - Teknik Mesin' ? 'selected' : '' }}>D3 - Teknik Mesin</option>
                    <option {{ $mahasiswa->prodi == 'D4 - Akuntansi Syariah' ? 'selected' : '' }}>D4 - Akuntansi Syariah</option>
                    <option {{ $mahasiswa->prodi == 'D4 - Teknik Pengendalian Pencemaran Lingkungan' ? 'selected' : '' }}>D4 - Teknik Pengendalian Pencemaran Lingkungan</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="periode_masuk" class="block mb-2 text-sm font-medium text-gray-900">Periode Masuk</label>
                    <input type="text" name="periode_masuk" id="periode_masuk" value="{{ $mahasiswa->periode_masuk }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tahun Masuk" required />
                </div>
                <div class="mb-5">
                    <label for="golongan_ukt" class="block mb-2 text-sm font-medium text-gray-900">Pilih Golongan UKT</label>
                    <select id="golongan_ukt" name="golongan_ukt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option {{ $mahasiswa->golongan_ukt == 'UKT 1 - Rp 1.000.000' ? 'selected' : '' }}>UKT 1 - Rp 1.000.000</option>
                        <option {{ $mahasiswa->golongan_ukt == 'UKT 2 - Rp 2.000.000' ? 'selected' : '' }}>UKT 2 - Rp 2.000.000</option>
                        <option {{ $mahasiswa->golongan_ukt == 'UKT 3 - Rp 3.000.000' ? 'selected' : '' }}>UKT 3 - Rp 3.000.000</option>
                        <option {{ $mahasiswa->golongan_ukt == 'UKT 4 - Rp 4.000.000' ? 'selected' : '' }}>UKT 4 - Rp 4.000.000</option>
                        <option {{ $mahasiswa->golongan_ukt == 'UKT 5 - Rp 5.000.000' ? 'selected' : '' }}>UKT 5 - Rp 5.000.000</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.mahasiswa') }}" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>    
    </div>
</x-app-layout>
