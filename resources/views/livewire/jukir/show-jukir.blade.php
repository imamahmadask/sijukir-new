<div>
    <div class="px-5 h-max mb-4">
        <x-toast :message="session('success')" />

        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
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
                        <a href="{{ route('jukir.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Jukir
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
                            Detail Jukir</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Header --}}
        <div class="mt-5">
            <img class="rounded-full w-48 h-48 mx-auto ring-2 ring-gray-500 dark:ring-gray-50"
                src="/storage/{{ $jukir->foto }}" alt="image description">

            <h1 class="m-2 text-center text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                    {{ $jukir->nama_jukir }}
                </span>
            </h1>
            <h4 class="text-2xl font-bold dark:text-white text-center">
                @if ($jukir->ket_jukir == 'Active')
                    {{ $jukir->merchant->merchant_name }}
                @else
                    {{ $jukir->kode_jukir }}
                @endif
            </h4>
            <h3 class="text-3xl font-bold dark:text-white text-center">
                {{ $jukir->lokasi->titik_parkir }} - {{ $jukir->lokasi->lokasi_parkir }}
                <a type="button" href="/admin/lokasi/{{ $jukir->lokasi->id }}" target="_blank"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                    </svg>
                    <span class="sr-only">Show Location</span>
                </a>
                <br>
                @php
                    $styles = [
                        'Active' => 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-50',
                        'Pending' => 'text-orange-700 bg-orange-100 dark:bg-orange-700 dark:text-orange-50',
                        'Non Active' => 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-50',
                    ];
                    $style = $styles[$jukir->ket_jukir] ?? '';
                @endphp

                <span class="text-center text-lg font-semibold me-2 px-2.5 py-0.5 rounded ms-2 {{ $style }}">
                    {{ $jukir->ket_jukir }}
                </span>
            </h3>
        </div>

        {{-- Body Profile --}}
        <section class="bg-white dark:bg-gray-900 mt-5">
            <div class="py-8 px-5 mx-auto max-w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg">
                <div class="flex justify-between text-center align-middle">
                    <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                        <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                            Biodata
                        </span>
                    </h2>

                    <a type="button" href="/admin/jukir/{{ $jukir->id }}/edit"
                        class="text-white justify-end mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-3 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="sr-only">Edit Jukir</span>
                    </a>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Lengkap
                        </label>
                        <input type="text" value="{{ $jukir->nama_jukir }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIK
                        </label>
                        <input type="text" value="{{ $jukir->nik_jukir }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jenis Kelamin
                        </label>
                        <input type="text" value="{{ $jukir->jenis_kelamin }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="tempat_tgl_lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tempat, Tgl Lahir
                        </label>
                        <input type="text" value="{{ $jukir->tempat_lahir }}, {{ $jukir->tgl_lahir }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="Alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat
                        </label>
                        <input type="text" value="{{ $jukir->alamat }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="kel_kec" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kelurahan/Kecamatan
                        </label>
                        <input type="text" value="{{ $jukir->kel_alamat }} / {{ $jukir->kec_alamat }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kota/Kabupaten
                        </label>
                        <input type="text" value="{{ $jukir->kab_kota_alamat }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Telepon
                        </label>
                        <input type="text" value="{{ $jukir->telepon }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                </div>

                <hr class="my-6">

                <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                    <span
                        class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                        Other
                    </span>
                </h2>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="no_perjanjian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            No. Perjanjian
                        </label>
                        <input type="text" value="{{ $jukir->no_perjanjian }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="tgl_perjanjian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Perjanjian
                        </label>
                        <input type="text" value="{{ $jukir->tgl_perjanjian }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="tgl_awal_taping"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Awal Taping
                        </label>
                        <input type="text"
                            value="@if ($jukir->ket_jukr == 'Active') {{ $jukir->tgl_terbit_qr }} @else - @endif"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="korlap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Korlap
                        </label>
                        <input type="text" value="{{ $jukir->lokasi->korlap->nama }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    @if ($jukir->old_merchant_id)
                        <div class="w-full">
                            <label for="merchant_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Merchant Baru
                                <span class="text-green-700 dark:text-green-400">
                                    ({{ date('d-M-Y', strtotime($jukir->historiMerchant->tanggal_perubahan)) }})
                                </span>
                            </label>
                            <input type="text" value="{{ $jukir->merchant->merchant_name }}"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="w-full">
                            <label for="old_merchant_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Merchant Lama
                            </label>
                            <input type="text" value="{{ $jukir->oldMerchant->merchant_name }}"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                    @endif
                    <div class="w-full">
                        <label for="hari_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Hari Kerja (Perminggu)
                        </label>
                        <input type="text" value="{{ $jukir->jml_hari_kerja }} Hari"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="hari_kerja_bulan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Hari Kerja (Perbulan)
                        </label>
                        <input type="text" value="{{ $jukir->hari_kerja_bulan }} Hari"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="waktu_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Waktu Kerja
                        </label>
                        <input type="text" value="{{ $jukir->waktu_kerja }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Hari Libur
                        </label>
                        <input type="text" value="{{ implode(', ', json_decode($jukir->hari_libur)) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                </div>

                <div class="my-5">
                    <a type="button" href="/storage/{{ $jukir->document }}" target="_blank"
                        class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                        </svg>
                        Lihat Dokumen
                    </a>
                    @if ($jukir->status == 'Non-Tunai')
                        <a type="button" href="/storage/{{ $jukir->merchant->qris }}" target="_blank"
                            class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                            </svg>
                            Lihat QRIS
                        </a>
                    @endif
                </div>
            </div>
        </section>

        <section class="mt-5">
            <div class="grid gap-4 my-4 lg:grid-cols-2">
                {{-- Histori Jukir --}}
                <div class="py-8 px-5 w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg bg-white">
                    <div class="flex justify-between text-center align-middle">
                        <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                            <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                                Histori Jukir
                            </span>
                        </h2>

                        {{-- Modal --}}
                        <button data-modal-target="create-histori-modal" data-modal-toggle="create-histori-modal"
                            class="text-white justify-end mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-3 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                            <span class="sr-only">Add Histori Jukir</span>
                        </button>

                        @teleport('body')
                            <!-- Tambah Histori Modal -->
                            @livewire('jukir.histori.create-histori', ['jukir_id' => $jukir->id])
                        @endteleport
                    </div>

                    {{-- List Histori --}}
                    <div class="ml-3 mt-3">
                        @livewire('jukir.histori.list-histori', ['jukir_id' => $jukir->id])
                    </div>
                </div>

                {{-- Jukir Pembantu --}}
                <div class="py-8 px-5 w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg bg-white">
                    <div class="flex justify-between text-center align-middle">
                        <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                            <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                                Jukir Pembantu
                            </span>
                        </h2>

                        {{-- Modal --}}
                        <button data-modal-target="create-jukpem-modal" data-modal-toggle="create-jukpem-modal"
                            class="text-white justify-end mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-3 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                            <span class="sr-only">Add Jukir Pembantu</span>
                        </button>

                        @teleport('body')
                            <!-- Tambah Histori Modal -->
                            @livewire('jukir.pembantu.create-pembantu', ['jukir_id' => $jukir->id])
                        @endteleport
                    </div>

                    {{-- List Pembantu --}}
                    @livewire('jukir.pembantu.list-pembantu', ['jukir_id' => $jukir->id])

                </div>

            </div>
        </section>

        <section class="bg-white dark:bg-gray-900 mt-5">
            <div class="py-8 px-5 mx-auto max-w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg">
                <div class="flex justify-between text-center align-middle">
                    <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                        <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                            Potensi & Perolehan
                        </span>
                    </h2>

                    {{-- <a type="button" href="/admin/jukir/{{ $jukir->id }}/edit"
                        class="text-white justify-end mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-3 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="sr-only">Edit Jukir</span>
                    </a> --}}
                </div>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="potensi_harian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Potensi Harian
                        </label>
                        <input type="text" value="Rp. {{ number_format($jukir->potensi_harian) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="potensi_bulanan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Potensi Bulanan
                            <span class="text-xs">
                                ({{ number_format($jukir->potensi_harian) }} x
                                {{ $jukir->hari_kerja_bulan }})
                            </span>
                        </label>
                        <input type="text" value="Rp. {{ number_format($jukir->potensi_bulanan) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    @if ($jukir->uji_petik > 0)
                        <div class="w-full">
                            <label for="potensi_uji_petik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Potensi Uji Petik
                            </label>
                            <input type="text" value="Rp. {{ number_format($jukir->uji_petik) }}"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="w-full">
                            <label for="potensi_upl_bulanan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Potensi Bulanan UPL
                                <span class="text-xs">
                                    ({{ number_format($jukir->uji_petik) }} x
                                    {{ $jukir->hari_kerja_bulan }})
                                </span>
                            </label>
                            <input type="text" value="Rp. {{ number_format($jukir->potensi_bulanan_upl) }}"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                    @endif
                    <div class="w-full">
                        <label for="perolehan_tunai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Perolehan Tunai
                        </label>
                        <input type="text" value="Rp. {{ number_format($jukir->totalTunai()) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full">
                        <label for="perolehan_non_tunai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Perolehan Non-Tunai
                        </label>
                        <input type="text" value="Rp. {{ number_format($jukir->totalNontunai()) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                    <div class="w-full sm:col-span-2">
                        <label for="total_perolehan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Total Perolehan
                        </label>
                        <input type="text" value="Rp. {{ number_format($jukir->totalSetoran()) }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            disabled>
                    </div>
                </div>

                <hr class="my-6">

                <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                    <span
                        class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                        Perolehan Per Tahun
                    </span>
                </h2>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if ($jukir->status == 'Non-Tunai')
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tahun
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Trx
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Non-Tunai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Potensi Tahunan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kurang Setor
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->perTahun() as $data)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b font-medium text-gray-900 whitespace-nowrap dark:text-white dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4">
                                            {{ $data->tahun }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ number_format($data->Jml_Trx) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ number_format($data->NonTunai) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ number_format($data->Potensi) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($data->Kurang_Setor > 0)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-600">
                                                    Rp. {{ number_format($data->Kurang_Setor) }}
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-600">
                                                    Rp. {{ number_format($data->Kurang_Setor) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr
                                    class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 whitespace-nowrap">
                                    <th class="px-6 py-4">Total</th>
                                    <th class="px-6 py-4">
                                        {{ number_format($this->perTahun()->sum('Jml_Trx')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perTahun()->sum('NonTunai')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perTahun()->sum('Potensi')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perTahun()->sum('Kurang_Setor')) }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <div class="m-2 dark:text-white">
                            Jukir Masih Tunai
                        </div>
                    @endif
                </div>

                <hr class="my-6">

                <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                    <span
                        class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                        Perolehan Per Bulan
                    </span>
                </h2>

                <div class="py-2.5 mb-3">
                    <select wire:model.live="perYear" name="perYear"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block lg:w-32 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if ($jukir->status == 'Non-Tunai')
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Bulan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Trx
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Non-Tunai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Potensi Bulanan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kurang Setor
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->perBulan($perYear) as $data)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b font-medium text-gray-900 whitespace-nowrap dark:text-white dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4">
                                            {{ date('F', mktime(0, 0, 0, $data->bulan, 1)) }}-{{ $data->tahun }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ number_format($data->jml_trx) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ number_format($data->non_tunai) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ number_format($data->potensi) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight
                                            {{ $data->kurang_setor > 0 ? 'text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-600' : 'text-yellow-700 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-600' }}">
                                                Rp.
                                                {{ $data->kurang_setor > 0 ? '+' . number_format($data->kurang_setor) : number_format($data->kurang_setor) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr
                                    class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 whitespace-nowrap">
                                    <th class="px-6 py-4">Total</th>
                                    <th class="px-6 py-4">
                                        {{ number_format($this->perBulan($perYear)->sum('jml_trx')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perBulan($perYear)->sum('non_tunai')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perBulan($perYear)->sum('potensi')) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        Rp. {{ number_format($this->perBulan($perYear)->sum('kurang_setor')) }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <div class="m-2 dark:text-white">
                            Jukir Masih Tunai
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @if ($jukir->status == 'Non-Tunai')
            @livewire('nontunai.show-nontunai', [
                'merchant_id' => $jukir->merchant_id,
            ])

            @if ($jukir->old_merchant_id)
                @livewire('non-tunai.show-nontunai', [
                    'merchant_id' => $jukir->old_merchant_id,
                ])
            @endif
        @else
            <div class="m-3 dark:text-white">
                Jukir Masih Tunai
            </div>
        @endif
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
