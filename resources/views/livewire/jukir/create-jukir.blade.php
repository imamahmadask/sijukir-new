<div>
    <div class="px-5 mb-4">
        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                            Tambah Jukir</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Tambah Jukir
        </h1>

        <form wire:submit="addJukir">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Lokasi Parkir</label>
                    <select name="lokasi" wire:model="lokasi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Lokasi Parkir</option>
                        @foreach ($lokasis as $lokasi)
                            <option value={{ $lokasi->id }}>{{ $lokasi->titik_parkir }}</option>
                        @endforeach
                    </select>
                    @error('lokasi')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="kode_jukir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kode Jukir
                    </label>
                    <x-input type="text" name="kode_jukir" model="kode_jukir" placeholder="Contoh: 001-AMP" />
                    <x-input-error for="kode_jukir" />
                </div>
                <div>
                    <label for="nama_jukir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Jukir</label>
                    <x-input type="text" name="nama_jukir" model="nama_jukir" placeholder="Contoh: Abdul Awal" />
                    <x-input-error for="nama_jukir" />
                </div>
                <div>
                    <label for="nik_jukir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NIK Jukir</label>
                    <x-input type="number" name="nik_jukir" model="nik_jukir" placeholder="Contoh: 527xxxx" />
                    <x-input-error for="nik_jukir" />
                </div>
                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Kelamin</label>
                    <select wire:model="jenis_kelamin" name="jenis_kelamin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select wire:model="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Budha">Budha</option>
                    </select>
                    @error('agama')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <x-input type="text" name="tempat_lahir" model="tempat_lahir"
                        placeholder="Masukkan Tempat Lahir Sesuai KTP" />
                    <x-input-error for="tempat_lahir" />
                </div>
                <div>
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Lahir</label>
                    <x-input type="date" name="tgl_lahir" model="tgl_lahir" placeholder="" />
                    <x-input-error for="tgl_lahir" />
                </div>
                <div class="sm:col-span-2">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat</label>
                    <x-input type="text" name="alamat" model="alamat"
                        placeholder="Masukkan Alamat Sesuai KTP" />
                    <x-input-error for="alamat" />
                </div>
                <div>
                    <label for="kel_alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kelurahan Alamat
                    </label>
                    <x-input type="text" name="kel_alamat" model="kel_alamat"
                        placeholder="Masukkan Kelurahan Sesuai KTP" />
                    <x-input-error for="kel_alamat" />
                </div>
                <div>
                    <label for="kec_alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kecamatan Alamat</label>
                    <x-input type="text" name="kec_alamat" model="kec_alamat"
                        placeholder="Masukkan Kecamatan Sesuai KTP" />
                    <x-input-error for="kec_alamat" />
                </div>
                <div>
                    <label for="kab_kota_alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kab/Kota Alamat</label>
                    <x-input type="text" name="kab_kota_alamat" model="kab_kota_alamat"
                        placeholder="Masukkan Kab/Kota Sesuai KTP" />
                    <x-input-error for="kab_kota_alamat" />
                </div>
                <div>
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No. Telpon</label>
                    <x-input type="number" name="telepon" model="telepon" placeholder="Masukkan No. Telp" />
                    <x-input-error for="telepon" />
                </div>
                <div>
                    <label for="no_perjanjian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No. Perjanjian</label>
                    <x-input type="text" name="no_perjanjian" model="no_perjanjian" placeholder="" />
                    <x-input-error for="no_perjanjian" />
                </div>
                <div>
                    <label for="tgl_perjanjian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Perjanjian</label>
                    <x-input type="date" name="tgl_perjanjian" model="tgl_perjanjian" placeholder="" />
                    <x-input-error for="tgl_perjanjian" />
                </div>
                <div>
                    <label for="jml_hari_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jumlah Hari Kerja (seminggu)</label>
                    <x-input type="number" name="jml_hari_kerja" model="jml_hari_kerja" placeholder="Contoh: 7" />
                    <x-input-error for="jml_hari_kerja" />
                </div>
                <div>
                    <label for="hari_kerja_bulan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jumlah Hari Kerja (sebulan)</label>
                    <x-input type="number" name="hari_kerja_bulan" model="hari_kerja_bulan"
                        placeholder="Contoh: 28" />
                    <x-input-error for="hari_kerja_bulan" />
                </div>
                <div>
                    <label for="hari_libur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hari Libur (Jika Ada)</label>
                    <select multiple wire:model="hari_libur" name="hari_libur"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($dayList as $data)
                            <option value="{{ $data }}">{{ $data }}</option>
                        @endforeach
                    </select>
                    @error('hari_libur')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="waktu_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Waktu Kerja</label>
                    <select wire:model="waktu_kerja" name="waktu_kerja"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Waktu Kerja</option>
                        <option value="Pagi-Siang">Pagi-Siang</option>
                        <option value="Pagi-Sore">Pagi-Sore</option>
                        <option value="Pagi-Malam">Pagi-Malam</option>
                        <option value="Siang-Sore">Siang-Sore</option>
                        <option value="Siang-Malam">Siang-Malam</option>
                        <option value="Sore-Malam">Sore-Malam</option>
                    </select>
                    @error('waktu_kerja')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="potensi_harian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Potensi Harian</label>
                    <x-input type="number" name="potensi_harian" model="potensi_harian"
                        placeholder="Contoh: 50.000" />
                    <x-input-error for="potensi_harian" />
                </div>
                <div>
                    <label for="potensi_bulanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Potensi Bulanan</label>
                    <x-input type="number" name="potensi_bulanan" model="potensi_bulanan"
                        placeholder="Contoh: 1.000.000" />
                    <x-input-error for="potensi_bulanan" />
                </div>
                <div>
                    <label for="uji_petik" class="block mb-2 text-sm font-medium text-green-600 dark:text-green-400">
                        Uji Petik</label>
                    <x-input type="number" name="uji_petik" model="uji_petik" placeholder="Contoh: 60.000" />
                    <x-input-error for="uji_petik" />
                </div>
                <div>
                    <label for="potensi_bulanan_upl"
                        class="block mb-2 text-sm font-medium text-green-600 dark:text-green-400">
                        Potensi Bulanan UPL</label>
                    <x-input type="number" name="potensi_bulanan_upl" model="potensi_bulanan_upl"
                        placeholder="Contoh: 1.200.000" />
                    <x-input-error for="potensi_bulanan_upl" />
                </div>
                <div class="sm:col-span-2">
                    <label for="tgl_pkh_upl"
                        class="block mb-2 text-sm font-medium text-green-600 dark:text-green-400">
                        Tanggal PKH UPL</label>
                    <x-input type="date" name="tgl_pkh_upl" model="tgl_pkh_upl" placeholder="" />
                    <x-input-error for="tgl_pkh_upl" />
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Foto
                        Jukir</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="foto_help" wire:model="foto" type="file">
                    <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="foto_help">PNG, JPG or Webp
                        (Max. 2Mb)</p>
                    @error('foto')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                    @if ($foto)
                        <img src="{{ $foto->temporaryUrl() }}" width="100px">
                    @endif
                    <div wire:loading>
                        <div role="status">
                            <svg aria-hidden="true" class="w-5 h-5 ml-2 text-gray-200 animate-spin fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="document">
                        Dokumen Jukir</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="document_help" wire:model="document" type="file">
                    <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="document_help">
                        PDF (Max. 5Mb)</p>
                    @error('document')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                    <div wire:loading>
                        <div role="status">
                            <svg aria-hidden="true" class="w-5 h-5 ml-2 text-gray-200 animate-spin fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Submit
            </button>
            <a type="button" href="{{ route('jukir.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
