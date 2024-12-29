@extends('layout.sidebar')
@section('judul','Edit Buku')
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
        <h2 class=" text-xl text-center font-bold text-gray-900 mb-5 ">Mengedit Buku</h2>
        <form action="{{ route('buku.update',$buku->f_id) }}" method="POST">
            @csrf
            @method('put')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="f_judul" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Buku</label>
                    <input type="text" name="f_judul" id="f_judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Masukan Judul Buku" value="{{$buku->f_judul}}" required="">
                </div>
                <div class="w-full">
                    <label for="f_penerbit" class="block mb-2 text-sm font-medium text-gray-900 ">Penerbit</label>
                    <input type="text" name="f_penerbit" id="f_penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Penerbit" value="{{$buku->f_penerbit}}" required="">
                </div>
                <div class="w-full">
                    <label for="f_pengarang" class="block mb-2 text-sm font-medium text-gray-900 ">Pengarang</label>
                    <input type="text" name="f_pengarang" id="f_pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Nama Pengarang" value="{{$buku->f_pengarang}}" required="">
                </div>
                <div class="w-full">
                    <label for="f_stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stok</label>
                    <input type="number" name="f_stock" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210" required value="{{$buku->detailbuku->f_stock}}" />
                </div>

                <div>
                    <label for="f_idkategori" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                    <select name="f_idkategori" id="f_idkategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected disabled>Kategori</option>
                        @foreach ( $kategori as $k)
                        <option value="{{$k->f_id}}" {{ $k->f_id == $buku->f_idkategori ? 'selected' : '' }}>{{$k->f_kategori}}</option>
                        @endforeach

                      </select>
                </div>
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <select name="f_status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option  selected disabled>{{$buku->detailbuku->f_status}}</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>

                      </select>
                </div>
                <div>
                    <label for="f_deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                    <textarea id="f_deskripsi" name="f_deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis deskripsi buku disini...">{{$buku->f_deskripsi}}</textarea>
                </div>

            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
               Edit Buku
            </button>
        </form>
    </div>
  </section>
@endsection
