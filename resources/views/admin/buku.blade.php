@extends('layout.sidebar')
@section('judul','List Buku')
@section('content')
@if (session('berhasil'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('berhasil') }}!",
        icon: "success"
        });
</script>
@endif
@if (session('failed'))
<script>
    Swal.fire({
        title: "Ooops!",
        text: "{{ session('failed') }}!",
        icon: "error"
        });
</script>
@endif
    <h1 class="text-3xl font-bold mb-10">List Buku</h1>

    <div class="my-5 flex justify-start ">

        <a href="{{ route('buku.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Tambah Buku</a>

        {{-- <a href="{{ route('admin.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Admin</a> --}}

       </div>

    <div class="ml-5 relative overflow-x-auto shadow-md sm:rounded-lg ">

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
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Status
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
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
                        {{$item->detailbuku->f_stock}}
                    </td>
                    <td class="px-7 py-5 ">
                        @if ($item->detailbuku->f_stock < 1)
                            Tidak Tersedia

                        @else
                            Tersedia
                        @endif
                    </td>
                    <td class="px-7 py-5 ">
                        <div class="flex space-x-1">
                            <form class="flex space-x-1" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Buku {{$item->f_judul}}?');" action="{{ route('buku.destroy', $item->f_id) }}" method="POST">
                                <a href="{{ route('buku.edit', $item->f_id) }}">
                                    <i class="p-2 text-md rounded bg-green-500 text-white fa-regular fa-pen-to-square"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="p-2 text-md rounded bg-red-500 text-white cursor-pointer fa-solid fa-trash"></i></button>
                            </form>



                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $buku->links() }}
    </div>
@endsection
