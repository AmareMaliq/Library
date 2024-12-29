@extends('layout.index')

@section('judul','Riwayat')
@section('content')
    
<div class="mt-28  pb-30">
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-10 mb-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-bold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Riwayat Peminjaman Anda
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Status pengembalian buku berdasarkan apakah anda sudah mengembalikan atau <span class="text-red-500">belum</span>.</p>
        </caption>
        <thead class="text-xs  uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   No
                </th>
                <th scope="col" class="px-6 py-3">
                    Buku
                </th>
                <th scope="col" class="px-6 py-3">
                   Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                   Status
                </th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    @if ($item->detailpeminjaman)
                        {{$item->detailpeminjaman->detailbuku->buku->f_judul}}
                    @else
                        N/A
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$item->admin->f_nama}}
                </td>
                <td class="px-6 py-4">
                    {{$item->f_tanggalpeminjaman}}
                </td>
                <td class="px-6 py-4">
                    @if ($item->detailpeminjaman && $item->detailpeminjaman->f_tanggalkembali == null)
                        <p class="bg-[#ff4d4f] px-2 py-2 w-28 text-xs rounded-lg text-white ">Belum dikembalikan</p>
                    @else
                        <p class="bg-green-500 px-2 py-2 w-24 text-xs rounded-lg text-white ">Dikembalikan</p>
                    @endif
                </td>
            </tr>
        @endforeach
        
         
        </tbody>
    </table>
</div>

</div>


@endsection