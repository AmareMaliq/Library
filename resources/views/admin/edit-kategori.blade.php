@extends('layout.sidebar')
@section('judul','Tambah Kategori')
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
<section class="bg-white rounded-xl border max-w-96  border-gray-200">
    <div class="py-8 px-4   lg:py-12">
        <h2 class=" text-xl text-start font-bold text-gray-900 mb-10 ">Mengubah Kategori</h2>
        <form action="{{ route('kategori.update',$kategori->f_id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="w-72">
                    <label for="f_kategori" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Kategori</label>
                    <input type="text" name="f_kategori" id="f_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Masukan nama kategori" value="{{$kategori->f_kategori}}" required="">
                </div>
                
                
           
            <a href="/admin/kategori">
                <button type="button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kembali
                 </button>
            </a>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
               Edit
            </button>
        </form>
    </div>
  </section>
@endsection
    