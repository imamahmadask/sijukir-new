<div>
    <div class="px-5 mb-4 h-screen">
        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow-sm"
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
                        <a href="{{ route('berlangganan.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Berlangganan
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
                            Tambah Berlangganan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Tambah Berlangganan
        </h1>

        <form wire:submit="updateBerlangganan">
            <input type="hidden" name="" wire:model="berlanggananId">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="tgl_dikeluarkan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Kwitansi</label>
                    <input type="date" name="tgl_dikeluarkan" wire:model.live="tgl_dikeluarkan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <x-input-error for="tgl_dikeluarkan" />
                </div>

                <div>
                    <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                        Kwitansi</label>
                    <x-input type="text" name="nomor" model="nomor" placeholder="Masukkan No. Kwitansi" />
                    <x-input-error for="nomor" />
                </div>

                <div class="sm:col-span-2">
                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Kendaraan
                    </label>
                    <select name="jenis" wire:model.live="jenis"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilh Jenis</option>
                        <option value="Mobil">Mobil</option>
                        <option value="Truck">Truck</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('jenis')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jumlah Nominal
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="jumlah" wire:model="jumlah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan Jumlah Bayar">
                    </div>
                    <x-input-error for="jumlah" />
                </div>

                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama
                    </label>
                    <x-input type="text" name="nama" model="nama" placeholder="Masukkan Nama" />
                    <x-input-error for="nama" />
                </div>

                <div>
                    <label for="no_pol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No. Polisi
                    </label>
                    <x-input type="text" name="no_pol" model="no_pol" placeholder="Masukkan No. Rekening" />
                    <x-input-error for="no_pol" />
                </div>

                <div class="sm:col-span-2">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat
                    </label>
                    <x-input type="text" name="alamat" model="alamat" placeholder="Masukkan Alamat" />
                    <x-input-error for="alamat" />
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>
                    <select name="status" wire:model.live="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilh Status</option>
                        <option value="Berkala">Berkala</option>
                        <option value="Numpang Uji">Numpang Uji</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('status')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <label for="masa_berlaku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masa Berlaku
                    </label>
                    <x-input type="number" name="masa_berlaku" model="masa_berlaku"
                        placeholder="Masukkan masa berlaku" />
                    <x-input-error for="masa_berlaku" />
                </div>

                <div>
                    <label for="awal_berlaku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Awal Berlaku
                    </label>
                    <input type="date" name="awal_berlaku" wire:model="awal_berlaku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        disabled>
                    <x-input-error for="awal_berlaku" />
                </div>

                <div>
                    <label for="akhir_berlaku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Akhir Berlaku
                    </label>
                    <input type="date" name="akhir_berlaku" wire:model="akhir_berlaku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        disabled>
                    <x-input-error for="akhir_berlaku" />
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
                Edit
            </button>
            <a type="button" href="{{ route('berlangganan.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
