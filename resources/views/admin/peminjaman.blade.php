@extends('layout.sidebar')
@section('judul','Peminjaman')
@section('content')
@if (session('berhasil'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: "{{session('berhasil')}}!",
        icon: "success"
    })
</script>
@endif
@if (session('failed'))
<script>
    Swal.fire({
        title: 'Ooops gagal',
        text: "{{session('failed')}}!",
        icon: "error"
    })
</script>
@endif
@if ($errors->any())
<div class="alert alert-danger bg-red-500 px-3 py-2 w-96 ml-5 mt-5 rounded-t-lg">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1 class="text-3xl font-bold mb-10">List Peminjaman</h1>

<div class="my-5 flex justify-start ">

    <a href="{{ route('peminjaman.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Tambah peminjaman</a>

    <a href="/admin/peminjaman/pdf" class=" py-2 px-4  bg-red-500 text-white font-semibold rounded-xl shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-file-pdf pr-2"></i></i>Cetak PDF</a>

    {{-- <a href="{{ route('admin.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Admin</a> --}}
    
   </div>

   <div class="ml-5 overflow-x-auto shadow-xl rounded-lg relative">

    <table class="w-full text-sm text-gray-500 text-left shadow-slate-600">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs ">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Nama Admin</th>
                <th class="px-6 py-3">Peminjam</th>
                <th class="px-6 py-3">Judul Buku</th>
                <th class="px-6 py-3">Tanggal Peminjaman</th>
                <th class="px-6 py-3">Tanggal Kembali</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
            <tr class="border-b bg-white hover:bg-gray-50 text-gray-900">
                <td class="px-7 py-5">
                    {{$loop->iteration}}
                </td>
                <td class="px-7 py-5">
                    {{$p->peminjaman->admin->f_nama}}
                </td>
                <td class="px-7 py-5">
                    {{$p->peminjaman->anggota->f_username}}
                </td>
                <td class="px-7 py-5">
                    {{$p->detailbuku->buku->f_judul}}
                </td>
                <td class="px-7 py-5">
                    {{$p->peminjaman->f_tanggalpeminjaman}}
                </td>
                <td class="px-7 py-5">
                    @if ($p->f_tanggalkembali == null )
                    <p class="bg-[#ff4d4f] px-2 py-2 text-xs rounded-lg text-white ">Belum dikembalikan</p>
                    @else
                    <p class="bg-green-500 px-2 py-2 text-xs rounded-lg text-white ">Dikembalikan</p>

                    @endif
                    
                </td>
                <td class="px-7 py-5">
                    <div class="flex space-x-1">
                        <form onsubmit="return confirm('apakah anda ingin mengembalikan buku ini? {{$p->detailbuku->buku->f_judul}}')" class="flex space-x-1" action="{{ route('pengembalian', $p->f_id) }}" method="post">
                            @csrf
                         
                         
                            <button type="submit" >
                                <i class="fa-solid fa-check p-2 text-md rounded bg-yellow-500 text-black"></i>
                            </button>
    
                        </form>
                        <a href="{{ route('peminjaman.edit', $p->f_id) }}">
                            <i class="p-2 text-md rounded bg-green-500 text-white fa-regular fa-pen-to-square"></i>
                        </a>
                        <form class="" onsubmit="return confirm('apakah anda yakin ingin menghapus peminjaman anggota {{$p->peminjaman->anggota->f_username}}?' )" action="{{route('peminjaman.destroy',$p->f_id)}}" method="post">
                          
                        
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
   </div>


@endsection