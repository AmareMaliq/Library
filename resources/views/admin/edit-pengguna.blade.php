@extends('layout.sidebar')
@section('judul','Edit Anggota')
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
<section class="bg-white rounded-xl border border-gray-200">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-12">
        <h2 class=" text-xl text-center font-bold text-gray-900 mb-5 ">Mengedit Anggota</h2>
        <form action="{{route('pengguna.update',$anggota->f_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="f_nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Anggota</label>
                    <input type="text" name="f_nama" id="f_nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Masukan nama anggota" required="" value="{{$anggota->f_nama}}">
                </div>
                <div class="w-full">
                    <label for="f_username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input type="text" name="f_username" id="f_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Username" required="" value="{{$anggota->f_username}}">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                    <input type="password" name="f_password" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="******" required="" value="{{$anggota->f_password}}">
                </div>

                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tempat Lahir</label>
                    <input type="text" name="f_tempatlahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Pondok Bambu,Jakarta" required="" value="{{$anggota->f_tempatlahir}}">
                </div>
                <div >
                    <label for="f_tanggallahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Lahir</label>
                    <input type="date" name="f_tanggallahir" id="f_tanggallahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "  required="" value="{{$anggota->f_tanggallahir}}">
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
               Edit Anggota
            </button>
        </form>
    </div>
  </section>
@endsection
