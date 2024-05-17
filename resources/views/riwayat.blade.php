<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Transaksi') }}
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:shawdo-gray-700">
        <p class="text-center font-semibold text-lg">Riwayat Transaksi Pembayaran UKT</p>
        <div class="max-w-xl mt-5">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-semibold">
                        <th class="px-6 py-3">Semester</th>
                        <th class="px-6 py-3">Tanggal Pembayaran</th>
                        <th class="px-6 py-3">Bukti Pembayaran</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Data Riwayat Transaksi -->
                    @forelse ($mhs as $data)
                    <tr>
                        <td class="px-6 py-4">{{ $data->semester }}</td>
                        <td class="px-6 py-4">{{ $data->created_at }}</td>
                        <td class="px-6 py-4">
                            {{-- <img src="{{ url('storage/bukti/'. $data->bukti) }}" alt="Bukti Pembayaran" class="h-12 w-12 object-cover rounded-lg"> --}}
                            <a href="{{ asset('storage/bukti/' . $data->bukti) }}" target="_blank">
                                <img src="{{ asset('storage/bukti/' . $data->bukti) }}" alt="Bukti Pembayaran" class="h-12 w-12 object-cover rounded-lg">
                            </a>
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
                    </tr>
                        
                    @empty
                        <tr>
                            <td>tidak ada riwayat</td>
                        </tr>
                    @endforelse
                    

                </tbody>
            </table>
        </div>
           
    </div>

</x-app-layout>