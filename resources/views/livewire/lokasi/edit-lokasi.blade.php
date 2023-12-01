<div>
    <div class="px-5 mb-4">
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
                        <a href="{{ route('lokasi.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Lokasi
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
                            Edit Lokasi</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Edit
            <span class="italic">
                ({{ $titik_parkir }})
            </span>
        </h1>

        <form wire:submit="updateLokasi" enctype="multipart/form-data">
            <input type="hidden" name="" wire:model="lokasiId">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="pendaftaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Pendaftaran</label>
                    <select name="pendaftaran" wire:model="pendaftaran"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Jenis Pendaftaran</option>
                        <option value="Baru">Pendaftaran Baru</option>
                        <option value="Ulang">Registrasi Ulang</option>
                    </select>
                    @error('pendaftaran')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="tgl_registrasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl
                        Registrasi</label>
                    <x-input type="date" name="tgl_registrasi" model="tgl_registrasi" placeholder="" />
                    <x-input-error for="tgl_registrasi" />
                </div>
                <div>
                    <label for="titik_parkir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Titik Parkir</label>
                    <x-input type="text" name="titik_parkir" model="titik_parkir"
                        placeholder="Contoh: Alfamart Pejanggik" />
                    <x-input-error for="titik_parkir" />
                </div>
                <div>
                    <label for="lokasi_parkir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                        Parkir</label>
                    <x-input type="text" name="lokasi_parkir" model="lokasi_parkir"
                        placeholder="Contoh:  Jl. Pejanggik" />
                    <x-input-error for="lokasi_parkir" />
                </div>
                <div>
                    <label for="kecamatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select wire:model.live="kecamatan" name="kecamatan"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Kecamatan</option>
                        @foreach ($areas as $area)
                            <div wire:key="{{ $area->id }}">
                                <option value="{{ $area->id }}">{{ $area->kecamatan }}</option>
                            </div>
                        @endforeach
                    </select>
                    @error('kecamatan')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="kelurahan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                    <select wire:model="kelurahan" name="kelurahan"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Kelurahan</option>
                        @if ($kel)
                            @foreach ($kel as $data)
                                <div wire:key="{{ $data->id }}">
                                    <option value="{{ $data->id }}">{{ $data->kelurahan }}</option>
                                </div>
                            @endforeach
                        @endif
                    </select>
                    @error('kelurahan')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="jenis_lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Lokasi</label>
                    <select wire:model="jenis_lokasi" name="jenis_lokasi"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Jenis Lokasi</option>
                        <option value="TJU">Tepi Jalan Umum</option>
                        <option value="TKP">Tempat Khusus Parkir</option>
                    </select>
                    @error('jenis_lokasi')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                        Lokasi</label>
                    <select wire:model="kategori" name="kategori"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Kategori Lokasi</option>
                        <option value="Apotek">Apotek</option>
                        <option value="Bank">Bank</option>
                        <option value="Cafe">Cafe</option>
                        <option value="Minimarket">Minimarket</option>
                        <option value="Pasar-TJU">Pasar-TJU</option>
                        <option value="Pasar-TKP">Pasar-TKP</option>
                        <option value="Pertokoan">Pertokoan Umum</option>
                        <option value="Rumah Makan">Rumah Makan/Warung</option>
                        <option value="Taman-TJU">Taman-TJU</option>
                        <option value="Taman-TKP">Taman-TKP</option>
                        <option value="Pelataran PKL">Pelataran PKL</option>
                    </select>
                    @error('kategori')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="sisi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisi</label>
                    <x-input type="text" name="sisi" model="sisi" placeholder="Contoh:  Kiri Jalan" />
                    <x-input-error for="sisi" />
                </div>
                <div>
                    <label for="panjang_luas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang/Luas
                        (m/m2)</label>
                    <x-input type="text" name="panjang_luas" model="panjang_luas" placeholder="Contoh:  8/50" />
                    <x-input-error for="panjang_luas" />
                </div>
                <div>
                    <label for="korlap"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Korlap</label>
                    <select wire:model="korlap" name="korlap"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Korlap</option>
                        @foreach ($korlaps as $korlap)
                            <option value="{{ $korlap->id }}">{{ $korlap->nama }}</option>
                        @endforeach
                    </select>
                    @error('korlap')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="waktu_pelayanan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                        Pelayanan</label>
                    <select wire:model="waktu_pelayanan" name="waktu_pelayanan"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Waktu Pelayanan</option>
                        <option value="Pagi-Siang">Pagi - Siang</option>
                        <option value="Pagi-Sore">Pagi - Sore</option>
                        <option value="Pagi-Malam">Pagi - Malam</option>
                        <option value="Siang-Sore">Siang - Sore</option>
                        <option value="Siang-Malam">Siang - Malam</option>
                        <option value="Sore-Malam">Sore - Malam</option>
                    </select>
                    @error('waktu_pelayanan')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="hari_buka" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hari Buka (Seminggu)</label>
                    <x-input type="number" name="hari_buka" model="hari_buka" placeholder="Contoh:  8/50" />
                    <x-input-error for="hari_buka" />
                </div>
                <div>
                    <label for="dasar_ketetapan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dasar Ketetapan</label>
                    <select wire:model="dasar_ketetapan"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected>Pilih Dasar Ketetapan</option>
                        <option value="PERWAL">PERWAL </option>
                        <option value="SK WALIKOTA">SK WALIKOTA</option>
                        <option value="SK KADIS">SK KADIS</option>
                    </select>
                    @error('dasar_ketetapan')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <label for="google_maps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Link Google Maps</label>
                    <x-input type="text" name="google_maps" model="google_maps"
                        placeholder="Contoh: https://xxx" />
                    <x-input-error for="google_maps" />
                </div>
                <div>
                    <label for="kordinat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Latitude & Longitude</label>
                    <x-input type="text" name="kordinat" model="kordinat"
                        placeholder="Contoh : -8.571916072854874, 116.07651346378012" />
                    <x-input-error for="kordinat" />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Foto
                        Lokasi</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="gambar_help" wire:model="gambar" type="file">
                    <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="gambar_help">PNG, JPG or Webp
                        (Max. 2Mb)</p>
                    @error('gambar')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                    @if ($gambar)
                        @if ($gambar->extension() != 'pdf')
                            <span class="mb-2 text-xs italic text-gray-400">
                                Gambar Preview
                            </span>
                            <img src="{{ $gambar->temporaryUrl() }}" class="h-28">
                        @endif
                    @else
                        <img src="/storage/{{ $gambar_asli }}" class="mt-2 h-28" alt="">
                    @endif
                    <div wire:loading wire:target="gambar">
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
                    <label for="keterangan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea wire:model="keterangan" name="keterangan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tambahkan keterangan jika ada"></textarea>
                    @error('keterangan')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="is_active"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Active?</label>
                    <select wire:model="is_active" name="is_active"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=1>Active</option>
                        <option value=0>Non-Active</option>
                    </select>
                    @error('is_active')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Edit
                <div wire:loading wire:target="updateJukir">
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
            <a type="button" href="{{ route('lokasi.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
