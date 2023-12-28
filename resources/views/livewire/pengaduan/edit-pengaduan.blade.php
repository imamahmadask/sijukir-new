<div>
    {{-- Modal Edit Pengaduan --}}
    <div wire:ignore.self id="edit-pengaduan-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Pengaduan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-pengaduan-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form wire:submit="editPengaduan" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama
                            </label>
                            <input type="text" name="nama" wire:model="nama"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="telepon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                            <input type="text" name="telepon" wire:model="telepon"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="titik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titik
                                Parkir</label>
                            <input type="text" name="titik" wire:model="titik"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="lokasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                                Parkir</label>
                            <input type="text" name="lokasi" wire:model="lokasi"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="jenis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Pengaduan</label>
                            <input type="text" name="jenis" wire:model="jenis"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="pesan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Isi Pengaduan</label>
                            <textarea id="pesan" wire:model="pesan" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled>
                            </textarea>
                        </div>
                        @if ($foto)
                            <div class="col-span-2">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Foto Pengaduan
                                </label>
                                <figure class="max-w-lg">
                                    <img class="h-auto max-w-full rounded-lg" src="/storage/{{ $foto }}"
                                        alt="image description">

                                </figure>
                            </div>
                        @endif
                        <div class="col-span-2">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Status Pengaduan
                            </label>
                            <select wire:model.live="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Pilih status</option>
                                <option value="Belum Diproses">Belum Diproses</option>
                                <option value="Sedang Diproses">Sedang Diproses</option>
                                <option value="Selesai Diproses">Selesai Diproses</option>
                            </select>
                            <x-input-error for="status" />
                        </div>
                        @if ($status == 'Sedang Diproses')
                            <div class="col-span-2">
                                <label for="tgl_diproses"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Diproses
                                </label>
                                <x-input type="date" name="tgl_diproses" model="tgl_diproses" placeholder="" />
                            </div>
                        @elseif($status == 'Selesai Diproses')
                            <div class="col-span-2">
                                <label for="tgl_selesai_proses"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Selesai Diproses
                                </label>
                                <x-input type="date" name="tgl_selesai_proses" model="tgl_selesai_proses"
                                    placeholder="" />
                            </div>
                        @endif
                        <div class="col-span-2">
                            <label for="saran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Saran/Hasil Tindak Lanjut
                            </label>
                            <textarea id="saran" wire:model="saran" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit Pengaduan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
