<div>
    <div class="px-5 h-screen mb-4">
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
                        <a href="{{ route('tunai.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Tunai
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
                            Tambah Tunai</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Tambah Tunai
        </h1>

        <form wire:submit="updateTunai">
            <input type="hidden" name="" wire:model="tunaiId">

            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Type Transaksi
                    </label>
                    <select name="type" wire:model.live="type" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Type</option>
                        <option value="Migrasi">Migrasi</option>
                        <option value="Non-Migrasi">Non-Migrasi</option>
                    </select>
                    @error('type')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="jukir_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Jukir
                    </label>
                    <select name="jukir_id" wire:model="jukir_id" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Jukir</option>
                        @foreach ($jukirs as $jukir)
                            <option value={{ $jukir->id }}>{{ $jukir->nama_jukir }}</option>
                        @endforeach
                    </select>
                    @error('jukir_id')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="no_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No Kwitansi
                    </label>
                    <x-input type="text" name="no_kwitansi" model="no_kwitansi"
                        placeholder="Masukkan No. Kwitansi" />
                    <x-input-error for="no_kwitansi" />
                </div>

                @if ($type == 'migrasi')
                    <div>
                        <label for="tgl_perjanjian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl
                            Perjanjian</label>
                        <x-input type="date" name="tgl_perjanjian" model="tgl_perjanjian" placeholder="" />
                        <x-input-error for="tgl_perjanjian" />
                    </div>

                    <div>
                        <label for="tgl_terbit_qr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl Terbit
                            QR</label>
                        <x-input type="date" name="tgl_terbit_qr" model="tgl_terbit_qr" placeholder="" />
                        <x-input-error for="tgl_terbit_qr" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="jml_hari"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Hari</label>
                        <x-input type="number" name="jml_hari" model="jml_hari" placeholder="Jumlah Hari" />
                        <x-input-error for="jml_hari" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="potensi_harian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potensi
                            Harian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="potensi_harian" wire:model="potensi_harian"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Potensi Harian">
                        </div>
                    </div>
                @endif

                <div class="sm:col-span-2">
                    <label for="tgl_transaksi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Bayar</label>
                    <x-input type="date" name="tgl_transaksi" model="tgl_transaksi"
                        placeholder="Masukkan No. Rekening" />
                    <x-input-error for="tgl_transaksi" />
                </div>

                <div class="sm:col-span-2">
                    <label for="jumlah_transaksi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jumlah Transaksi
                    </label>
                    <x-input type="number" name="jumlah_transaksi" model="jumlah_transaksi"
                        placeholder="Masukkan Jumlah Transaksi" />
                    <x-input-error for="jumlah_transaksi" />
                </div>

                <div class="sm:col-span-2">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Keterangan</label>
                    <textarea id="keterangan" wire:model="keterangan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan keterangan jika ada"></textarea>
                </div>
            </div>

            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Submit
            </button>
            <a type="button" href="{{ route('tunai.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
