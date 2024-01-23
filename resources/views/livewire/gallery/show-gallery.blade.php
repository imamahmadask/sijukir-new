<div>
    {{-- Modal Tambah Histori --}}
    <div wire:ignore.self id="show-gallery-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Show Gallery
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="show-gallery-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-5">
                    <div class="mb-2">
                        <span
                            class="mb-2 bg-blue-100 text-blue-800 text-md font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                            {{ $kategori }}
                        </span>
                        <h1 class="flex items-center text-2xl font-extrabold dark:text-white">
                            {{ $judul }}
                        </h1>
                        <span class="dark:text-white italic text-sm">
                            {{ date('d-M-Y', strtotime($tanggal)) }}
                        </span>
                        <h4 class="text-md font-normal text-gray-900 dark:text-white">
                            {{ $deskripsi }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($gambars as $gambar)
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="/storage/{{ $gambar }}"
                                    alt="">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
