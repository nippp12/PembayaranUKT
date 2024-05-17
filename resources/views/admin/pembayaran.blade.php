<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pembayaran') }}
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto block max-w-6xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:shawdo-gray-700">
        <p class="text-center font-semibold text-lg">Daftar Pembayaran UKT</p>
        <form action="{{ route('admin.pembayaran') }}" method="get" class="mb-6">

            <div class="flex items-center justify-center">
            
                <input type="text" name="search" placeholder="Cari berdasarkan Nama, NIM, atau Semester" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('search') }}" id="">
                <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Cari</button>

            </div>        
        
        </form>
            <div class=" mt-5 overflow-x-scroll">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="text-left font-semibold">
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">NIM</th>
                            <th class="px-6 py-3">Semester</th>
                            <th class="px-6 py-3">Tanggal Pembayaran</th>
                            <th class="px-6 py-3">Golongan UKT</th>
                            <th class="px-6 py-3">Bukti Pembayaran</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Data Manajemen Pembayaran UKT -->
                        @foreach ($mahasiswa as $data)    
                            <tr>
                                <td class="px-6 py-4">{{ $data->user->name }}</td>
                                <td class="px-6 py-4">{{ $data->user->nim }}</td>
                                <td class="px-6 py-4">{{ $data->semester }}</td>
                                <td class="px-6 py-4">{{ $data->created_at }}</td>
                                <td class="px-6 py-4">{{ $data->golongan_ukt }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ url('storage/bukti/'. $data->bukti) }}" alt="Bukti Pembayaran" class="h-12 w-12 object-cover rounded-lg">
                                </td>
                                <td class="px-6 py-4">
                                    @if ($data->status == 'menunggu')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-green-800">
                                    Menunggu
                                </span>
                                @elseif ($data->status == 'disetujui')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Disetujui
                                    </span>
                                @elseif ($data->status == 'ditolak')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                        Ditolak
                                    </span>
                                @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-x-4">
                                        <form action="{{ route('admin.update.status')}} " method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <input type="hidden" name="status" value="disetujui">
                                            <button type="submit" class="edit-btn px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Disetujui</button>
                                        </form>

                                        <form action="{{ route('admin.update.status')}} " method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="save-btn px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" >Ditolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</x-app-layout>
