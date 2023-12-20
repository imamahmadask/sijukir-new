<div>
    {{-- Modal Tambah Jukpem --}}
    <div wire:ignore.self id="create-jukpem-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Jukir Pembantu
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="create-jukpem-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form wire:submit="addJukirPembantu" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama</label>
                            <x-input type="text" name="nama" model="nama"
                                placeholder="Masukkan Nama Jukir Pembantu" />
                            @error('nama')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIK</label>
                            <x-input type="text" name="nik" model="nik"
                                placeholder="Masukkan NIK Jukir Pembantu" />
                            @error('nik')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tempat_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tempat Lahir
                            </label>
                            <x-input type="text" name="tempat_lahir" model="tempat_lahir"
                                placeholder="Masukkan Tempat Lahir" />
                            <x-input-error for="tempat_lahir" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Lahir
                            </label>
                            <x-input type="date" name="tgl_lahir" model="tgl_lahir" placeholder="" />
                            <x-input-error for="tgl_lahir" />
                        </div>
                        <div class="col-span-2">
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jenis Kelamin
                            </label>
                            <select wire:model="jenis_kelamin" name="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <x-input-error for="jenis_kelamin" />
                        </div>
                        <div class="col-span-2">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Alamat
                            </label>
                            <x-input type="text" name="alamat" model="alamat" placeholder="Masukkan Alamat" />
                            @error('alamat')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kel_alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelurahan Alamat
                            </label>
                            <x-input type="text" name="kel_alamat" model="kel_alamat"
                                placeholder="Masukkan Kelurahan" />
                            <x-input-error for="kel_alamat" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kec_alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kecamatan Alamat
                            </label>
                            <x-input type="text" name="kec_alamat" model="kec_alamat"
                                placeholder="Masukkan Kelurahan" />
                            <x-input-error for="kec_alamat" />
                        </div>
                        <div class="col-span-2">
                            <label for="kab_kota_alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kab/Kota ALamat
                            </label>
                            <x-input type="text" name="kab_kota_alamat" model="kab_kota_alamat"
                                placeholder="Masukkan Kab/Kota alamat" />
                            @error('kab_kota_alamat')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Telepon
                            </label>
                            <x-input type="text" name="telepon" model="telepon" placeholder="Masukkan Telepon" />
                            @error('telepon')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="agama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Agama
                            </label>
                            <select wire:model="agama" name="agama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                            </select>
                            <x-input-error for="agama" />
                        </div>
                        <div class="col-span-2">
                            <label for="foto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Foto
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                aria-describedby="foto_help" wire:model="foto" type="file">
                            <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="foto_help">
                                PNG, JPG or Webp (Max. 2Mb)
                            </p>
                            @error('foto')
                                <span class="text-xs italic text-red-500"> {{ $message }} </span>
                            @enderror
                            @if ($foto)
                                <img src="{{ $foto->temporaryUrl() }}" width="100px">
                            @endif
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Jukir Pembantu
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
