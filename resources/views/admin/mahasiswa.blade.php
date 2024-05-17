<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto block max-w-6xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:shawdo-gray-700">
        <div class="flex justify-between mb-4">
            <h3 class="font-semibold text-lg">Daftar Mahasiswa PNC</h3>
            <a href="{{ route('admin.create') }}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah Mahasiswa</a>
        </div>
        <div class="overflow-x-scroll">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-semibold">
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">NIM</th>
                        <th class="px-6 py-3">Jurusan</th>
                        <th class="px-6 py-3">Program Studi</th>
                        <th class="px-6 py-3">Periode Masuk</th>
                        <th class="px-6 py-3">Golongan UKT</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Data Mahasiswa -->
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td class="px-6 py-4">{{ $mhs->nama }}</td>
                        <td class="px-6 py-4">{{ $mhs->nim }}</td>
                        <td class="px-6 py-4">{{ $mhs->jurusan }}</td>
                        <td class="px-6 py-4">{{ $mhs->prodi }}</td>
                        <td class="px-6 py-4">{{ $mhs->periode_masuk }}</td>
                        <td class="px-6 py-4">{{ $mhs->golongan_ukt }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.edit', $mhs->nim) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                            <form action="{{ route('admin.destroy', $mhs->nim) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

