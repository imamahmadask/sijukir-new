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

        @if ($insidentil->status == 'Success')
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

        <h3 class="dark:text-white text-2xl font-bold mb-5">
            {{ $insidentil->lokasi_acara }} - {{ $insidentil->tgl_awal_acara }} <br>
        </h3>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="tgl_pendaftaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tgl Pendaftaran
                </label>
                <input type="text" value="{{ $insidentil->tgl_pendaftaran }}" disabled
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
                <hr class="border-2 border-green-300 dark:border-green-400">
            </div>

            <div>
                <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Perusahaan
                </label>
                <input type="text" value="{{ $insidentil->nama_perusahaan }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="alamat_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Alamat Perusahaan
                </label>
                <input type="text" value="{{ $insidentil->alamat_perusahaan }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="akta_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Akta Perusahaan
                </label>
                <input type="text" value="{{ $insidentil->akta_perusahaan }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="npwp_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    NPWP Perusahaan
                </label>
                <input type="text" value="{{ $insidentil->npwp_perusahaan }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div class="sm:col-span-2 my-2">
                <hr class="border-2 border-blue-300 dark:border-blue-400">
            </div>

            <div>
                <label for="nama_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Acara
                </label>
                <input type="text" value="{{ $insidentil->nama_acara }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="lokasi_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
                <label for="tgl_awal_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tgl Awal Acara
                </label>
                <input type="text" value="{{ $insidentil->tgl_awal_acara }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="tgl_akhir_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tgl Akhir Acara
                </label>
                <input type="text" value="{{ $insidentil->tgl_akhir_acara }}" disabled
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>

            <div>
                <label for="lokasi_parkir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
                <label for="kriteria_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
