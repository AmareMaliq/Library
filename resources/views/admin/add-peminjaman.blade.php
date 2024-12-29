@extends('layout.sidebar')
@section('judul','Meminjam')
@section('content')
@if ($errors->any())
<div class="alert alert-danger bg-red-500 px-3 py-2 w-96 ml-5 mt-5 rounded-t-lg">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if (session()->has('failed'))
<script>
 Swal.fire({
     title: "Oops...",
     text: " {{session('failed')}}!",
     icon: "error"
     });
</script>

@endif
<section class="bg-white rounded-xl border border-gray-200">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-12">
        <h2 class=" text-xl text-center font-bold text-gray-900 mb-5 ">Meminjam Buku</h2>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="f_idadmin" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Admin</label>
                    <select name="f_idanggota" id="f_idanggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected value="{{Auth::guard('admin')->user()->f_id}}" >

                            {{Auth::guard('admin')->user()->f_username}}</option>


                      </select>
                </div>
                <div class="w-full">
                    <label for="f_idanggota" class="block mb-2 text-sm font-medium text-gray-900 ">Peminjam</label>
                    <select name="f_idanggota" id="f_idanggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        {{-- <option selected disabled>Nama Anggota</option> --}}
                        @foreach ($anggota as $a)
                        <option value="{{$a->f_id}}">
                            {{$a->f_nama}}

                        </option>

                        @endforeach
                      </select>
                </div>
                <div class="w-full">
                    <label for="f_iddetailbuku" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Buku</label>
                    <select name="f_iddetailbuku" id="f_iddetailbuku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        {{-- <option selected disabled>Buku</option> --}}
                        @foreach ($buku as $b)
                        <option value="{{$b->f_id}}">{{$b->buku->f_judul}}</option>

                        @endforeach
                      </select>
                </div>

                <div>
                    <label for="f_tanggalpeminjaman" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Peminjaman</label>
                    <input type="date" name="f_tanggalpeminjaman" id="f_tanggalpeminjaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" value="{{$now}}" disabled>

                </div>


            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
               Buat peminjaman
            </button>
        </form>
    </div>
  </section>
@endsection
