<div>
    <div>
        {{-- Modal Edit Histori --}}
        <div wire:ignore.self id="edit-histori-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Histori
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="edit-histori-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form wire:submit="editHistoriJukir" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="tgl_histori"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Histori</label>
                                <x-input type="date" name="tgl_histori" model="tgl_histori" placeholder="" />
                                @error('tgl_histori')
                                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="no_surat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                    Surat</label>
                                <x-input type="text" name="no_surat" model="no_surat"
                                    placeholder="Masukkan No. Surat" />
                                <x-input-error for="no_surat" />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="jenis_histori"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Jenis Histori</label>
                                <select wire:model="jenis_histori" name="jenis_histori"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Jenis</option>
                                    <option value="Ganti PKH">Ganti PKH</option>
                                    <option value="Ganti Jukir">Ganti Jukir</option>
                                    <option value="Jukir Berhenti">Jukir Berhenti</option>
                                    <option value="Jukir Libur">Jukir Libur</option>
                                    <option value="Toko Pindah Lokasi">Toko Pindah Lokasi</option>
                                    <option value="Toko Tutup">Toko Tutup</option>
                                    <option value="QR Peralihan">QR Peralihan</option>
                                </select>
                                <x-input-error for="jenis_histori" />
                            </div>
                            <div class="col-span-2">
                                <label for="histori"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Isi Histori
                                </label>
                                <textarea id="histori" rows="6" wire:model="histori"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan histori"></textarea>
                                <x-input-error for="histori" />
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit Histori
                        </button>
                        <button>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
