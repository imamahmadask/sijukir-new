<div>
    <div class="px-5 mb-4 h-max">
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
                            Tambah Insidentil</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Tambah Insidentil
        </h1>

        <form wire:submit="addInsidentil">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="tgl_pendaftaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Pendaftaran
                    </label>
                    <x-input type="date" name="tgl_pendaftaran" model="tgl_pendaftaran" placeholder="" />
                    <x-input-error for="tgl_pendaftaran" />
                </div>

                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Pengelola
                    </label>
                    <x-input type="text" name="nama" model="nama" placeholder="Masukkan Nama Pengelola" />
                    <x-input-error for="nama" />
                </div>

                <div>
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NIK Pengelola
                    </label>
                    <x-input type="text" name="nik" model="nik" placeholder="Masukkan nik Pengelola" />
                    <x-input-error for="nik" />
                </div>

                <div class="sm:col-span-2">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat Pengelola
                    </label>
                    <x-input type="text" name="alamat" model="alamat" placeholder="Masukkan Alamat Pengelola" />
                    <x-input-error for="alamat" />
                </div>

                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tempat Lahir
                    </label>
                    <x-input type="text" name="tempat_lahir" model="tempat_lahir"
                        placeholder="Masukkan tempat lahir Pengelola" />
                    <x-input-error for="tempat_lahir" />
                </div>

                <div>
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Lahir
                    </label>
                    <x-input type="date" name="tgl_lahir" model="tgl_lahir" placeholder="" />
                    <x-input-error for="tgl_lahir" />
                </div>

                <div>
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Kelamin
                    </label>
                    <select name="jk" wire:model="jk"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Agama
                    </label>
                    <select name="agama" wire:model="agama"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Agama</option>
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
                    <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pekerjaan
                    </label>
                    <x-input type="text" name="pekerjaan" model="pekerjaan"
                        placeholder="Masukkan Pekerjaan Pengelola" />
                    <x-input-error for="pekerjaan" />
                </div>

                <div>
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Telepon
                    </label>
                    <x-input type="text" name="telepon" model="telepon"
                        placeholder="Masukkan No. Telepon Pengelola" />
                    <x-input-error for="telepon" />
                </div>

                <div class="sm:col-span-2 my-2">
                    <hr class="border-2 border-green-300 dark:border-green-400">
                </div>

                <div>
                    <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Perusahaan
                    </label>
                    <x-input type="text" name="nama_perusahaan" model="nama_perusahaan"
                        placeholder="Masukkan Nama Perusahaan" />
                    <x-input-error for="nama_perusahaan" />
                </div>

                <div>
                    <label for="alamat_perusahaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat Perusahaan
                    </label>
                    <x-input type="text" name="alamat_perusahaan" model="alamat_perusahaan"
                        placeholder="Masukkan Alamat Perusahaan" />
                    <x-input-error for="alamat_perusahaan" />
                </div>

                <div>
                    <label for="akta_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Akta Perusahaan
                    </label>
                    <x-input type="text" name="akta_perusahaan" model="akta_perusahaan"
                        placeholder="Masukkan Akta Perusahaan" />
                    <x-input-error for="akta_perusahaan" />
                </div>

                <div>
                    <label for="npwp_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NPWP Perusahaan
                    </label>
                    <x-input type="text" name="npwp_perusahaan" model="npwp_perusahaan"
                        placeholder="Masukkan NPWP Perusahaan" />
                    <x-input-error for="npwp_perusahaan" />
                </div>

                <div class="sm:col-span-2 my-2">
                    <hr class="border-2 border-blue-300 dark:border-blue-400">
                </div>

                <div>
                    <label for="nama_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Acara
                    </label>
                    <x-input type="text" name="nama_acara" model="nama_acara"
                        placeholder="Masukkan Nama Acara" />
                    <x-input-error for="nama_acara" />
                </div>

                <div>
                    <label for="lokasi_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat Acara
                    </label>
                    <x-input type="number" name="lokasi_acara" model="lokasi_acara"
                        placeholder="Masukkan Lokasi Acara" />
                    <x-input-error for="lokasi_acara" />
                </div>

                <div>
                    <label for="waktu_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Waktu Acara
                    </label>
                    <select name="waktu_acara" wire:model="waktu_acara"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Waktu Acara</option>
                        <option value="Pagi-Siang">Pagi-Siang</option>
                        <option value="Pagi-Sore">Pagi-Sore</option>
                        <option value="Pagi-Malam">Pagi-Malam</option>
                        <option value="Siang-Sore">Siang-Sore</option>
                        <option value="Siang-Malam">Siang-Malam</option>
                        <option value="Sore-Malam">Sore-Malam</option>
                    </select>
                    @error('waktu_acara')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <label for="jumlah_hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jumlah Hari
                    </label>
                    <x-input type="number" name="jumlah_hari" model="jumlah_hari"
                        placeholder="Masukkan Jumlah Hari Acara" />
                    <x-input-error for="jumlah_hari" />
                </div>

                <div>
                    <label for="tgl_awal_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Awal Acara
                    </label>
                    <x-input type="date" name="tgl_awal_acara" model="tgl_awal_acara"
                        placeholder="Masukkan Tanggal Awal Acara" />
                    <x-input-error for="tgl_awal_acara" />
                </div>

                <div>
                    <label for="tgl_akhir_acara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Akhir Acara
                    </label>
                    <x-input type="date" name="tgl_akhir_acara" model="tgl_akhir_acara"
                        placeholder="Masukkan Tanggal Awal Acara" />
                    <x-input-error for="tgl_akhir_acara" />
                </div>

                <div>
                    <label for="lokasi_parkir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Lokasi Parkir
                    </label>
                    <x-input type="number" name="lokasi_parkir" model="lokasi_parkir"
                        placeholder="Masukkan Lokasi Parkir" />
                    <x-input-error for="lokasi_parkir" />
                </div>

                <div>
                    <label for="luas_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Luas Lokasi Parkir (m2)
                    </label>
                    <x-input type="number" name="luas_lokasi" model="luas_lokasi"
                        placeholder="Masukkan Luas Lokasi Parkir" />
                    <x-input-error for="luas_lokasi" />
                </div>

                <div>
                    <label for="kriteria_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kriteria Lokasi
                    </label>
                    <select name="kriteria_lokasi" wire:model.live="kriteria_lokasi"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Kriteria Lokasi</option>
                        <option value="TJU">Tepi Jalan Umum</option>
                        <option value="TKP">Tempat Khusus Parkir</option>
                        <option value="TPK">Tempat Parkir Khusus</option>
                    </select>
                    <x-input-error for="kriteria_lokasi" />
                </div>

                <div>
                    <label for="jenis_izin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Izin
                    </label>
                    <select name="jenis_izin" wire:model.live="jenis_izin"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Jenis Izin</option>
                        <option value="Pajak">Pajak</option>
                        <option value="Retribusi">Retribusi</option>
                    </select>
                    <x-input-error for="jenis_izin" />
                </div>

                <div>
                    <label for="r2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Potensi Roda 2
                    </label>
                    <x-input type="number" name="r2" model="r2" placeholder="Masukkan Potensi Roda 2" />
                    <x-input-error for="r2" />
                </div>

                <div>
                    <label for="r4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Potensi Roda 4
                    </label>
                    <x-input type="number" name="r4" model="r4" placeholder="Masukkan Potensi Roda 4" />
                    <x-input-error for="r4" />
                </div>

                <div>
                    <label for="potensi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Potensi
                    </label>
                    <x-input type="number" name="potensi" model="potensi"
                        placeholder="Masukkan Potensi Perhitungan" />
                    <x-input-error for="potensi" />
                </div>

                <div>
                    <label for="setoran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Setoran
                    </label>
                    <x-input type="number" name="setoran" model="setoran"
                        placeholder="Masukkan Total Yang harus disetor" />
                    <x-input-error for="setoran" />
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="dokumen">
                        Dokumen
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                        aria-describedby="dokumen_help" wire:model="dokumen" type="file">
                    <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="dokumen_help">
                        PDF (Max. 5Mb)</p>
                    @error('dokumen')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                    <div wire:loading wire:target="dokumen">
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

                <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Keterangan
                    </label>
                    <textarea id="keterangan" wire:model="keterangan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan keterangan jika ada"></textarea>
                </div>
            </div>

            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Submit
                <div wire:loading wire:target="addInsidentil">
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
            </button>

            <a type="button" href="{{ route('insidentil.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
