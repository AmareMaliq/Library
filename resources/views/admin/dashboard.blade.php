@extends('layout.sidebar')
@section('judul','Dashboard')
@section('content')
<!-- Option 1: Include in HTML -->


@if (session('berhasil'))
<script>


        Swal.fire({
  title: "Berhasil!",
  text: "{{ session('berhasil') }} {{Auth::guard('admin')->user()->f_username}}!",
  icon: "success"
});
</script>
@endif


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
   <div class="bg-white rounded-md border border-gray-200 p-6 shadow-xl shadow-black/5">
       <div class="flex justify-between mb-6">
           <div>
               <div class="flex items-center mb-1">
                  <div class="mr-10 ">
                    <svg class="flex-shrink-0 w-8 h-8 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                     </svg>
                  </div>
                   <div class="text-2xl font-semibold">{{$anggota}}</div>

               </div>
               <div class="text-sm font-medium text-gray-400">Anggota</div>

           </div>

       </div>

       <a href="{{ route('pengguna.index') }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
   </div>
   <div class="bg-white rounded-md border border-gray-200 p-6 shadow-xl shadow-black/5">
       <div class="flex justify-between mb-6">
           <div>
               <div class="flex items-center mb-1">
                  <div class="mr-10 ">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>

                  </div>
                   <div class="text-2xl font-semibold">{{$totalbuku}}</div>

               </div>
               <div class="text-sm font-medium text-gray-400">Buku</div>

           </div>

       </div>

       <a href="/admin/buku" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
   </div>
   <div class="bg-white rounded-md border border-gray-200 p-6 shadow-xl shadow-black/5">
       <div class="flex justify-between mb-6">
           <div>
               <div class="flex items-center mb-1">
                  <div class="mr-10 mt-1">
                     <svg class="flex-shrink-0 w-8 h-8 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                     </svg>
                  </div>
                   <div class="text-2xl font-semibold">{{$totalKategori}}</div>

               </div>
               <div class="text-sm font-medium text-gray-400">Kategori</div>

           </div>

       </div>

       <a href="/admin/kategori" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
   </div>
   <div class="bg-white rounded-md border border-gray-200 p-6 shadow-xl shadow-black/5">
       <div class="flex justify-between mb-4">
           <div>
               <div class="flex items-center mb-1">
                  <div class="mr-10 ">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                        <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>
                  </div>
                   <div class="text-2xl font-semibold">{{$peminjamanCount}}</div>
                   {{-- <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">+30%</div> --}}
               </div>
               <div class="text-sm font-medium text-gray-400">Peminjaman</div>
           </div>

       </div>
       <a href="/admin/peminjaman" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
   </div>

</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full mb-10">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center dark:bg-gray-700 dark:text-gray-400">
           <tr>
               <th scope="col" class="px-6 py-3">
                   No
               </th>
               <th scope="col" class="px-6 py-3">
                   Petugas
               </th>
               <th scope="col" class="px-6 py-3">
                   Peminjam
               </th>
               <th scope="col" class="px-6 py-3">
                   Buku
               </th>
               <th scope="col" class="px-6 py-3">
                   tanggal peminjaman
               </th>
               <th scope="col" class="px-6 py-3">
                   Tanggal Kembali
               </th>
               <th scope="col" class="px-6 py-3">
                   Status
               </th>
           </tr>
       </thead>
       <tbody>
        @forelse($peminjaman as $p)
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
                {{-- @if ($p->f_tanggalkembali == null )
                <p class="bg-[#ff4d4f] px-2 py-2 text-xs rounded-lg text-white ">Belum dikembalikan</p>
                @else
                <p class="bg-green-500 px-2 py-2 text-xs rounded-lg text-white ">Dikembalikan</p>

                @endif
                 --}}
                 {{$p->f_tanggalkembali}}
            </td>
            <td class="px-7 py-5">
                 @if ($p->f_tanggalkembali == null )
                <p class="bg-[#ff4d4f] px-2 py-2 text-xs rounded-lg text-white ">Belum dikembalikan</p>
                @else
                <p class="bg-green-500 px-2 py-2 text-xs rounded-lg text-white ">Dikembalikan</p>

                @endif
               
            </td>
           </tr>
           @empty
           <div role="alert" ">

            <div class="border mb-5 border-red-400 rounded-xl bg-red-100 px-4 py-3 text-red-700">
              <p>Data peminjaman belum tersedia.</p>
            </div>
          </div>
            @endforelse
       </tbody>
   </table>
</div>



@endsection
