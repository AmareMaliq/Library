@extends('layout.index')
@section('content')
    <section class=" md:h-screen overflow-hidden antialiased ">
        <div class="flex flex-col items-center justify-center px-6 py-8  mx-auto  lg:py-0 mt-20">
            <a href="#" class="flex items-center mb-6 text-2xl  font-semibold text-gray-900 ">
                <img class="w-8 h-8 mr-2" src="{{ asset('/img/65.png') }}" alt="logo">
                Perpustakaan
            </a>
            <div class="w-full bg-white rounded-lg  shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                @if (session()->has('failed'))
                <script>
                 Swal.fire({
                     title: "Oops...",
                     text: " {{session('failed')}}!",
                     icon: "error"
                     });
             </script>

                @endif
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login Admin
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        @csrf
                        <div>
                            <label for="f_username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="f_username" id="f_username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your username" required>
                        </div>
                        <div class="relative">
                            <label for="f_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="f_password" placeholder="Password" id="f_password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-eye absolute top-10 cursor-pointer right-3 " viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </div>

                        <button type="submit" class="w-full text-gray-900 bg-gradient-to-r from-[#FDFF89] to-[#FFE91F] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                        <p class="text-sm font-light ml-2 dark:text-white">
                            Bukan admin?
                            <a href="/anggota/login" class="font-bold text-[#FFE91F] hover:underline dark:text-primary-500">Login sebagai anggota.</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
      </section>
@endsection
