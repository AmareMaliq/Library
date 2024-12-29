@extends('layout.sidebar')
@section('judul','List Anggota')
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
        title: "Oops",
        text: "{{ session('failed') }}!",
        icon: "error"
        });
</script>
@endif


    <h1 class="text-3xl font-bold mb-10">List Pengguna</h1>

    <div class="my-5 flex justify-start ">
    
        <a href="{{ route('pengguna.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Tambah Anggota</a>

        {{-- <a href="{{ route('admin.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Admin</a> --}}
        
       </div>
   
    <div class="ml-5 relative overflow-x-auto shadow-md sm:rounded-lg ">
      
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tempat Lahir
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Tanggal Lahir
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{$loop->iteration}}
                    </td>
                  
                    <td class="px-6 py-4">
                        {{ $item->f_nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->f_username}}
                    </td>
                
                    <td class="px-6 py-4">
                        {{$item->f_tempatlahir}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->f_tanggallahir}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-1">
                            <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Anggota {{$item->f_username}}?');" action="{{ route('pengguna.destroy', $item->f_id) }}" method="POST">
                                <a href="/user-detail/{{ $item->slug }}">
                                    <i
                                        class="p-2 text-md rounded bg-blue-500 text-white fa-solid fa-circle-info"></i>
                                </a>
                                <a href="{{ route('pengguna.edit', $item->f_id) }}">
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
        <div class="mx-5 my-5">
            {{-- {{ $anggota->links() }} --}}
        </div>
        
    </div>

@endsection
    
