<div>
    <div class="px-5 h-max mb-4">
        <x-toast :message="session('success')" />

        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('peringatan.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Peringatan
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-blue-500 md:ml-2 dark:text-blue-400">
                            Detail Peringatan
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        @if ($peringatan->is_lunas == 1)
            <span
                class="bg-green-100 text-green-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800 ms-2">
                Success
            </span>
        @elseif(!$peringatan->is_lunas)
            <span
                class="bg-orange-100 text-orange-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-800 ms-2">
                On-Process
            </span>
        @endif

        <h1 class="mb-5 mt-5 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{ $peringatan->tipe }}
            </span>
        </h1>

        <h3 class="dark:text-white text-2xl font-bold mb-5">
            {{ $peringatan->jukir->nama_jukir }} - {{ $peringatan->jukir->merchant->merchant_name }} <br>
            <small class="font-semibold text-gray-500 dark:text-gray-400">
                {{ $peringatan->jukir->lokasi->titik_parkir }} - {{ $peringatan->jukir->lokasi->lokasi_parkir }}
                ({{ $peringatan->jukir->lokasi->area->kecamatan }})
            </small>
        </h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Item
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Data
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tipe
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            {{ $peringatan->tipe }}
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No. Surat
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            {{ $peringatan->no_surat }}
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tanggal Klarifikasi
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            {{ date('d F Y', strtotime($peringatan->tgl_klarifikasi)) }}
                        </td>
                    </tr>
                    @foreach ($peringatan->riwayat as $riwayat)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Kurang Setor {{ $riwayat['tahun'] }}
                            </th>
                            <td class="px-6 py-4 font-medium dark:text-white">
                                Rp. {{ number_format($riwayat['jumlah']) }}
                            </td>
                        </tr>
                    @endforeach
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Kompensasi
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            Rp. {{ number_format($peringatan->kompensasi) }}
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Jumlah Kurang Setor
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            <span
                                class="
                                    {{ $peringatan->is_lunas == 0 ? 'px-2 py-1 font-bold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600' : '' }}">
                                Rp. {{ number_format($peringatan->jml_kurang_setor) }}
                            </span>
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Total Bayar Kurang Setor
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            <span
                                class="
                                {{ $peringatan->is_lunas == 1 ? 'px-2 py-1 font-bold leading-tight text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-600' : '' }}">
                                Rp. {{ number_format($peringatan->total_bayar) }}
                            </span>
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Sisa Bayar Kurang Setor
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            Rp.
                            {{ number_format($peringatan->total_bayar - $peringatan->jml_kurang_setor) }}
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Batas Bayar Kurang Setor
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            {{ date('d F Y', strtotime($peringatan->batas_setor)) }}
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pembayaran
                        </th>
                        <td class="px-6 py-4 font-medium dark:text-white">
                            {{ $peringatan->cara_bayar }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="px-3 py-2 text-xs italic text-gray-700 dark:text-white dark:bg-gray-800">
                <p class="mb-5 text-sm">
                    Keterangan: <br>
                    {{ $peringatan->ket }}
                </p>
                <hr class="mb-2">
                Created By: <b>{{ $peringatan->created_by }}</b> ({{ $peringatan->created_at }}) <br>
                @if ($peringatan->edited_by)
                    Edited By: <b>{{ $peringatan->edited_by }}</b> ({{ $peringatan->updated_at }})
                @endif
            </div>
        </div>

        {{-- Tambah Histori Peringatan --}}
        <button data-modal-target="create-histori-peringatan-modal" data-modal-toggle="create-histori-peringatan-modal"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800  mr-2 mb-2">
            <svg class="w-6 h-6 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
            </svg>
            Tambah Histori
        </button>

        @teleport('body')
            <!-- Tambah Histori Modal -->
            @livewire('peringatan.histori.create-histori-peringatan', ['peringatan_id' => $peringatan->id])
        @endteleport

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Setor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ket. Lain
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peringatan->histori_peringatan as $histori)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ date('d F Y', strtotime($histori->tanggal)) }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rp. {{ number_format($histori->jml_setor) }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $histori->deskripsi }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $histori->keterangan }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="$dispatch('edit-histori-peringatan', { id: {{ $histori->id }} })"
                                    data-modal-target="edit-histori-peringatan-modal"
                                    data-modal-toggle="edit-histori-peringatan-modal"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </button>

                                @teleport('body')
                                    <!-- Edit  Histori Modal -->
                                    @livewire('peringatan.histori.edit-histori-peringatan')
                                @endteleport
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successToast = document.getElementById('toast-success');

        function closeToast(toastElement) {
            if (toastElement) {
                toastElement.style.display = 'none';
            }
        }

        if (successToast) {
            setTimeout(function() {
                closeToast(successToast);
            }, 3000);
        }
    });
</script>
