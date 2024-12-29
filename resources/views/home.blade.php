@extends('layout.index')
@section('content')
<div id="hero" class="mt-10  pb-30">
  <div class="container m-auto px-6 pt-24 md:px-12  lg:pt-[4.8rem] lg:px-7">
      <div class="grid lg:grid-cols-2 items-center gap-8 px-2 md:px-0">

          <div class="relative col-span-1">
              <div class="relative w-full">
                  <img class="rounded-lg" src="img/library.jpg" alt="library" loading="lazy" width="100%" height="640">

              </div>
          </div>
          <div class=" col-span-1">
            <h1 class="font-bold text-4xl md:text-6xl ">
              Buku Dapat Menerangi Hari Anda Seperti<br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#FFE91F] to-[#FDFF89] font-extrabold">Sinar Matahari.</span></h1>
            <div class="mt-5 lg:mt-10 space-y-8">
                {{-- <p class="text-slate-500 text-lg md:text-xl">Selamat datang di Perpustakaan 65. </p> --}}
                <div class="flex space-x-4 mt-6">
                    <a href="/books">
                        <button type="button" title="Mulai melihat"
                        class="w-full py-3 px-6 text-center rounded-full transition duration-300 bg-gray-900   text-white  sm:w-max">
                        <span class="block font-semibold text-sm">
                            Jelajahi buku
                        </span>
                    </button>
                    </a>
                    <a href="/anggota/login">
                        <button type="button" title="Mulai lah dengan perpustakaan kami"
                        class="w-full  text-gray-800  py-3 px-6 text-center rounded-full transition border border-gray-700  sm:w-max">
                        <span class="block font-semibold text-sm ">
                            Mari memulai
                        </span>
                    </button>
                    </a>
                </div>
            </div>
        </div>


      </div>
  </div>
</div>



@endsection
