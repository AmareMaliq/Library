@extends('layout.sidebar')
@section('judul','List Admins')
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

<h1 class="text-3xl font-bold mb-10">List Admin</h1>

    <div class="my-5 flex justify-start ">
    
        <a href="{{ route('admin.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Tambah Admin</a>

        {{-- <a href="{{ route('admin.create') }}" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Admin</a> --}}
        
       </div>
   
   
    <div class="ml-5 mt-5 relative overflow-x-auto shadow-lg rounded-lg">
        <table class="w-full text-sm text-left text-gray-400 ">
            <thead class="bg-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Username</th>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admin as $a)
                <tr class="bg-gray-800 hover:bg-gray-600 text-sm">
                    <td class="px-6 py-4">{{$loop->iteration}}</td>
                    <td class="px-6 py-4">{{$a->f_nama}}</td>
                    <td class="px-6 py-4">{{$a->f_username}}</td>
                    <td class="px-6 py-4">{{$a->f_level}}</td>
                    <td class="px-6 py-4">{{$a->f_status}}</td>
                    <td class="px-6 py-4">
                        <div class="space-x-1 flex">
                            <form class="space-x-1 flex" action="{{ route('admin.destroy', $a->f_id) }}" method="post" onsubmit="return confirm('apakah anda yakin ingin menghapus admin {{$a->f_nama}}?');">
                                <a  href="{{ route('admin.edit', $a->f_id) }}">  <i class="p-2 text-md rounded bg-green-500 text-white fa-regular fa-pen-to-square"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="p-2 text-md rounded bg-red-500 text-white cursor-pointer fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    
                </tr>
        
                @empty
                <div role="alert" ">
          
                    <div class="border mb-5 border-red-400 rounded-xl bg-red-100 px-4 py-3 text-red-700">
                      <p>Data Admin belum tersedia.</p>
                    </div>
                  </div>
                @endforelse
               
            </tbody>

        </table>

    </div>
@endsection