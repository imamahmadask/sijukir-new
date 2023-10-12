<div>
    <nav class="flex mt-3 mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/admin/lokasi"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-100 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Lokasi
                </a>
                <span
                    class="text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-100 dark:hover:text-white">&nbsp;/
                    Edit Lokasi</span>
            </li>
        </ol>
    </nav>

    <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
        Edit Lokasi Parkir
    </h1>

    <form wire:submit="updateLokasi" enctype="multipart/form-data">
        <input type="hidden" name="" wire:model="lokasiId">
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="pendaftaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Pendaftaran</label>
                <select name="pendaftaran" wire:model="pendaftaran"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <input type="date" name="tgl_registrasi" wire:model="tgl_registrasi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div>
                <label for="titik_parkir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titik
                    Parkir</label>
                <input type="text" name="titik_parkir" wire:model="titik_parkir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Contoh: Alfamart Pejanggik">
                @error('titik_parkir')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="lokasi_parkir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                    Parkir</label>
                <input type="text" name="lokasi_parkir" wire:model="lokasi_parkir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Contoh: Jl. Pejanggik">
                @error('lokasi_parkir')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="kecamatan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <select wire:model.live="kecamatan" name="kecamatan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <label for="sisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisi</label>
                <input type="text" name="sisi" wire:model="sisi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Cth: Kiri Jalan">
                @error('sisi')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="panjang_luas"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang/Luas (m/m2)</label>
                <input type="text" name="panjang_luas" wire:model="panjang_luas"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Cth: 8/100">
                @error('panjang_luas')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="korlap"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Korlap</label>
                <select wire:model="korlap" name="korlap"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilh Korlap</option>
                    <option value="1">Alfian</option>
                    <option value="2">Ismawan Hadi</option>
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <label for="hari_buka" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari Buka
                    (Seminggu)</label>
                <input type="number" name="hari_buka" wire:model="hari_buka"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="1-7 Hari">
                @error('hari_buka')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="dasar_ketetapan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dasar Ketetapan</label>
                <select wire:model="dasar_ketetapan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                <label for="google_maps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                    Google Maps</label>
                <input type="text" name="google_maps" wire:model="google_maps"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="http://">
                @error('google_maps')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label for="kordinat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude
                    & Longitude</label>
                <input type="text" name="kordinat" wire:model="kordinat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="123, 456">
                @error('kordinat')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Foto
                    Lokasi</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
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
            </div>
            <div>
                <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Lokasi</label>
                <select wire:model="is_active" name="is_active"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value=1>Active</option>
                    <option value=0>Non Active</option>
                </select>
                @error('is_active')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <textarea wire:model="keterangan" name="keterangan" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Tambahkan keterangan jika ada"></textarea>
                @error('keterangan')
                    <span class="text-xs italic text-red-500"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Edit
        </button>
    </form>
</div>
