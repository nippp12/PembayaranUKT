<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Pembayaran') }}
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:shawdo-gray-700">
        <p class="text-center font-semibold text-lg">Form Pembayaran UKT</p>
        <form action="{{ route('form.store') }}" method="post" class="mt-5 max-w-xl" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                  <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama </label>
                  <input type="nama" id="nama" value="{{ auth()->user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap" required />
                </div>
                <div class="mb-5">
                  <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 ">NIM</label>
                  <input name="nim" type="nim" id="nim" value="{{ auth()->user()->nim }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIM" required />
                </div>
            </div>

            <div class="mb-5">
                <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Jurusan</label>
                <select name="jurusan" id="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                
                  <option>Komputer Dan Bisnis</option>
                  <option>Rekayasa Mesin Dan Industri Pertanian</option>
                  <option>Rekayasa Elektro Dan Mekatronika</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Program Studi</label>
                <select name="prodi" id="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                
                  <option>D3 - Teknik Informatika</option>
                  <option>D3 - Teknik Mesin</option>
                  <option>D4 - Akuntansi Syariah</option>
                  <option>D4 - Teknik Pengendalian Pencemaran Lingkungan</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                  <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Semester</label>
                  <select  name="semester" id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  
                    <option>Semester 1</option>
                    <option>Semester 2</option>
                    <option>Semester 3</option>
                    <option>Semester 4</option>
                  </select>
                </div>
                <div class="mb-5">
                    <label for="golongan" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Golongan UKT</label>
                    <select name="golongan" id="golongan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                      <option>UKT 1 - Rp 1.000.000</option>
                      <option>UKT 2 - Rp 2.000.000</option>
                      <option>UKT 3 - Rp 3.000.000</option>
                      <option>UKT 4 - Rp 4.000.000</option>
                      <option>UKT 5 - Rp 5.000.000</option>
                    </select>
                </div>
            </div>

            <div class="mb-5">
              <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Bukti Pembayaran</label>
              <input name="bukti" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
              <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">*Wajib diisi.</div>
            </div>
            <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>    
    </div>
</x-app-layout>