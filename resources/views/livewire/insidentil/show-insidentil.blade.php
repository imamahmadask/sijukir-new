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
                        <a href="{{ route('insidentil.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Insidentil
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
                            Detail Insidentil
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        @if ($insidentil->status == 'Succeed')
            <span
                class="bg-green-100 text-green-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800 ms-2">
                {{ $insidentil->status }}
            </span>
        @elseif($insidentil->status == 'Pending')
            <span
                class="bg-orange-100 text-orange-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-800 ms-2">
                {{ $insidentil->status }}
            </span>
        @endif

        <h1 class="mb-5 mt-5 text-2xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{ $insidentil->nama_acara }} ({{ $insidentil->jenis_izin }})
            </span>
        </h1>

        <h3 class="dark:text-white sm:text-2xl font-bold mb-5 italic">
            {{ \Carbon\carbon::parse($insidentil->tgl_awal_acara)->format('d-M-Y') }} s/d
            {{ \Carbon\carbon::parse($insidentil->tgl_akhir_acara)->format('d-M-Y') }}
            ({{ $insidentil->jumlah_hari }} hari)
        </h3>

        <section class="bg-white dark:bg-gray-900 mt-5">
            <div class="py-8 px-5 mx-auto max-w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg">
                <div class="mb-4 flex justify-between text-center align-middle">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                            Data Pemohon
                        </span>
                    </h2>

                    <a type="button" href="/admin/insidentil/{{ $insidentil->id }}/edit"
                        class="text-white justify-end mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-3 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="sr-only">Edit</span>
                    </a>
                </div>

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="tgl_pendaftaran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tgl Pendaftaran
                        </label>
                        <input type="text" value="{{ $insidentil->tgl_pendaftaran }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nomor Surat
                        </label>
                        <input type="text" value="{{ $insidentil->no_surat }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="tgl_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tgl Surat
                        </label>
                        <input type="text" value="{{ $insidentil->tgl_surat }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Pengelola
                        </label>
                        <input type="text" value="{{ $insidentil->nama }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIK Pengelola
                        </label>
                        <input type="text" value="{{ $insidentil->nik }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat Pengelola
                        </label>
                        <input type="text" value="{{ $insidentil->alamat }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tempat Lahir
                        </label>
                        <input type="text" value="{{ $insidentil->tempat_lahir }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tgl Lahir
                        </label>
                        <input type="text" value="{{ $insidentil->tgl_lahir }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jenis Kelamin
                        </label>
                        <input type="text" value="{{ $insidentil->jk }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Agama
                        </label>
                        <input type="text" value="{{ $insidentil->agama }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pekerjaan
                        </label>
                        <input type="text" value="{{ $insidentil->pekerjaan }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Telepon
                        </label>
                        <input type="text" value="{{ $insidentil->telepon }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2 my-2">
                        <hr class="border-2 border-green-300 dark:border-green-400 mb-4">

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                                Data Perusahaan
                            </span>
                        </h2>
                    </div>

                    <div>
                        <label for="nama_perusahaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Perusahaan
                        </label>
                        <input type="text" value="{{ $insidentil->nama_perusahaan }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="alamat_perusahaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat Perusahaan
                        </label>
                        <input type="text" value="{{ $insidentil->alamat_perusahaan }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="akta_perusahaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Akta Perusahaan
                        </label>
                        <input type="text" value="{{ $insidentil->akta_perusahaan }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="npwp_perusahaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NPWP Perusahaan
                        </label>
                        <input type="text" value="{{ $insidentil->npwp_perusahaan }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2 my-2">
                        <hr class="border-2 border-green-300 dark:border-green-400 mb-4">

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                                Acara/Kegiatan/Event
                            </span>
                        </h2>
                    </div>

                    <div>
                        <label for="nama_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Acara
                        </label>
                        <input type="text" value="{{ $insidentil->nama_acara }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="lokasi_acara"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Lokasi Acara
                        </label>
                        <input type="text" value="{{ $insidentil->lokasi_acara }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="waktu_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Waktu Acara
                        </label>
                        <input type="text" value="{{ $insidentil->waktu_acara }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="jumlah_hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jumlah Hari
                        </label>
                        <input type="text" value="{{ $insidentil->jumlah_hari }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="tgl_awal_acara"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tgl Awal Acara
                        </label>
                        <input type="text" value="{{ $insidentil->tgl_awal_acara }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="tgl_akhir_acara"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tgl Akhir Acara
                        </label>
                        <input type="text" value="{{ $insidentil->tgl_akhir_acara }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="lokasi_parkir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Lokasi Parkir
                        </label>
                        <input type="text" value="{{ $insidentil->lokasi_parkir }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="luas_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Luas Lokasi Parkir (m2)
                        </label>
                        <input type="text" value="{{ $insidentil->luas_lokasi }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="kriteria_lokasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kriteria Lokasi
                        </label>
                        <input type="text" value="{{ $insidentil->kriteria_lokasi }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="jenis_izin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jenis Izin
                        </label>
                        <input type="text" value="{{ $insidentil->jenis_izin }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="r2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Potensi Roda 2
                        </label>
                        <input type="text" value="{{ $insidentil->r2 }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="r4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Potensi Roda 4
                        </label>
                        <input type="text" value="{{ $insidentil->r4 }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="potensi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Potensi
                        </label>
                        <input type="text" value="{{ $insidentil->potensi }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="setoran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Setoran
                        </label>
                        <input type="text" value="{{ $insidentil->setoran }}" disabled
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Keterangan
                        </label>
                        <textarea id="keterangan" value="{{ $insidentil->keterangan }}" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled>
                        </textarea>
                    </div>

                </div>
                <a type="button" href="/storage/{{ $insidentil->dokumen }}" target="_blank"
                    class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                    </svg>
                    Lihat Dokumen
                </a>
            </div>
        </section>
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
