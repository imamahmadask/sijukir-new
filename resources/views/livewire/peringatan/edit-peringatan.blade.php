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
                        <a href="{{ route('peringatan.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Peringatan
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
                            Edit Peringatan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Edit Peringatan
        </h1>

        <form wire:submit="editPeringatan">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="tgl_klarifikasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tgl Klarifikasi
                    </label>
                    <input type="date" name="tgl_klarifikasi" wire:model="tgl_klarifikasi"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <x-input-error for="tgl_klarifikasi" />
                </div>

                <div>
                    <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tipe Surat
                    </label>
                    <select name="tipe" wire:model="tipe"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilh Tipe</option>
                        <option value="Surat Kurang Setor">Surat Kurang Setor</option>
                        <option value="Surat Konfirmasi">Surat Konfirmasi</option>
                        <option value="SP 1">SP 1</option>
                        <option value="SP 2">SP 2</option>
                        <option value="Surat Panggilan">Surat Panggilan</option>
                    </select>
                    @error('tipe')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No Surat
                    </label>
                    <x-input type="text" name="no_surat" model="no_surat" placeholder="Masukkan No. Kwitansi" />
                    <x-input-error for="no_surat" />
                </div>

                <div>
                    <label for="selectedJukir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Juru Parkir
                    </label>
                    <select name="selectedJukir" wire:model.live="selectedJukir"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilh Jukir</option>
                        @foreach ($jukirs as $jukir)
                            <option value="{{ $jukir->id }}">{{ $jukir->nama_jukir }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="selectedJukir" />
                </div>

                @foreach ($riwayat as $index => $data)
                    <div>
                        <label for="riwayat.{{ $index }}.jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kurang Setor
                        </label>
                        <input type="number" name="riwayat.{{ $index }}.jumlah"
                            wire:model.live="riwayat.{{ $index }}.jumlah"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Kurang setor 2023">
                        <x-input-error for="riwayat.{{ $index }}.jumlah" />
                    </div>
                @endforeach

                <div>
                    <label for="kompensasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kompensasi
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
                        <input type="number" id="kompensasi" wire:model.live="kompensasi"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan Kompensasi">
                    </div>
                    <x-input-error for="kompensasi" />
                </div>

                <div>
                    <label for="jml_kurang_setor"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Total Kurang Setor
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
                        <input type="number" id="jml_kurang_setor" wire:model="jml_kurang_setor"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan Total Kurang Setor">
                    </div>
                    <x-input-error for="jml_kurang_setor" />
                </div>

                <div>
                    <label for="cara_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cara Bayar
                    </label>
                    <select name="cara_bayar" wire:model.live="cara_bayar"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilih Cara Bayar</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Cicil">Cicil</option>
                        <option value="Nihil">Nihil</option>
                    </select>
                    @error('cara_bayar')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <label for="batas_setor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Batas Setor
                    </label>
                    <x-input type="date" name="batas_setor" model="batas_setor" placeholder="" />
                    <x-input-error for="batas_setor" />
                </div>

                @if ($cara_bayar == 'Cicil')
                    <div class="sm:col-span-2">
                        <label for="banyak_cicilan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Banyak Cicilan
                        </label>
                        <input type="number" name="banyak_cicilan" wire:model.live="banyak_cicilan" min="2"
                            max="3"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <x-input-error for="banyak_cicilan" />
                    </div>

                    @if ($banyak_cicilan > 0)
                        @if ($cicilan)
                            @foreach ($cicilan as $index => $data)
                                <div>
                                    <label for="cicilan.{{ $index }}.tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tgl Cicilan
                                    </label>
                                    <x-input type="date" name="cicilan.{{ $index }}.tanggal"
                                        model="cicilan.{{ $index }}.tanggal" placeholder="" />
                                </div>

                                <div>
                                    <label for="cicilan.{{ $index }}.jumlah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Jml Cicilan
                                    </label>
                                    <x-input type="number" name="cicilan.{{ $index }}.jumlah"
                                        model="cicilan.{{ $index }}.jumlah" placeholder="" />
                                </div>
                            @endforeach
                        @else
                            @for ($i = 1; $i <= $banyak_cicilan; $i++)
                                <div>
                                    <label for="tgl_cicilan_{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tanggal Cicilan {{ $i }}
                                    </label>
                                    <x-input type="date" name="tgl_cicilan_{{ $i }}"
                                        model="tgl_cicilan_{{ $i }}" placeholder="" />
                                </div>

                                <div>
                                    <label for="jml_cicilan_{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Jumlah Cicilan {{ $i }}
                                    </label>
                                    <x-input type="number" name="jml_cicilan_{{ $i }}"
                                        model="jml_cicilan_{{ $i }}" placeholder="" />
                                </div>
                            @endfor
                        @endif
                    @endif
                @endif

                <div class="sm:col-span-2">
                    <label for="ket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Keteragan
                    </label>
                    <textarea id="ket" wire:model="ket" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan Keteragan jika ada">
                    </textarea>
                </div>
            </div>

            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Edit
                <div wire:loading wire:target="editPeringatan">
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
            <a type="button" href="{{ route('peringatan.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
