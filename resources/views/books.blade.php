@extends('layout.index')

@section('judul','Riwayat')
@section('content')
<div class="mt-28 pb-30">

    <div class="mx-10 relative overflow-x-auto shadow-md sm:rounded-lg ">
      
        <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-7 py-3">
                        No
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pengarang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penerbit
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Status
                    </th>
                   
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                    <td class="px-7 py-4">
                        {{$loop->iteration}}
                    </td>
                  
                    <td class="px-7 py-5">
                        {{ $item->f_judul }}
                    </td>
                    <td class="px-7 py-5">
                        {{ $item->f_pengarang}}
                    </td>
                
                    <td class="px-7 py-5">
                        {{$item->f_penerbit}}
                    </td>
                    <td class="px-7 py-5">
                        {{$item->kategori->f_kategori}}
                    </td>
                    <td class="px-7 py-5 ">
                        {{$item->f_deskripsi}}
                    </td>
                    <td class="px-7 py-5 ">
                        @if (  $item->detailbuku->f_status == 'Tersedia')
                        <p class="text-center bg-green-500 text-sm px-2 py-2 rounded-lg text-white">{{$item->detailbuku->f_status}}</p>
                        @else
                        <p class="text-center bg-red-500 text-sm px-2 py-2 rounded-lg text-white">{{$item->detailbuku->f_status}}</p>
                        @endif
                      
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</div>

@endsection