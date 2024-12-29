<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>

    <div class="text-center text-xl mb-5">
        <h1>Laporan Peminjaman</h1>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse border border-slate-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
            <tr>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    No
                </th>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    Petugas
                </th>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    Peminjam
                </th>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    Judul Buku
                </th>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3 border border-slate-700">
                    Tanggal Kembali
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border border-slate-700">
                   {{$loop->iteration}}
                </th>
                <td class="px-6 py-4 border border-slate-700">
                    {{$item->peminjaman->admin->f_username}}
                </td>
                <td class="px-6 py-4 border border-slate-700">
                   {{$item->peminjaman->anggota->f_username}}
                </td>
                <td class="px-6 py-4 border border-slate-700">
                   {{$item->detailbuku->buku->f_judul}}
                </td>
                <td class="px-6 py-4 border border-slate-700">
                    {{$item->peminjaman->f_tanggalpeminjaman}}
                </td>
                <td class="px-6 py-4 border border-slate-700">
                    <p class="text-xl fonr-bold text-center">-</p>
                </td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>

</body>
</html>
