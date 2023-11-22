<div>
    <div class="px-5 mb-4">
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
                        <a href="{{ route('merchant.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Merchant
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
                            Tambah Merchant</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Tambah Merchant
        </h1>

        <form wire:submit="addMerchant">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        ID Merchant
                    </label>
                    <x-input type="number" name="id" model="id" placeholder="Masukkan ID Merchant QRIS" />
                    <x-input-error for="id" />
                </div>
                <div class="sm:col-span-2">
                    <label for="no_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NMID
                    </label>
                    <x-input type="text" name="nmid" model="nmid" placeholder="Masukkan NMID Merchant QRIS" />
                    <x-input-error for="nmid" />
                </div>
                <div class="sm:col-span-2">
                    <label for="merchant_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merchant Name</label>
                    <x-input type="text" name="merchant_name" model="merchant_name"
                        placeholder="Contoh: Jukir Dishub 001" />
                    <x-input-error for="merchant_name" />
                </div>
                <div class="sm:col-span-2">
                    <label for="no_rekening" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        Rekening</label>
                    <x-input type="text" name="no_rekening" model="no_rekening"
                        placeholder="Masukkan No. Rekening" />
                    <x-input-error for="no_rekening" />
                </div>
                <div class="sm:col-span-2">
                    <label for="tgl_terdaftar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Terdaftar
                    </label>
                    <x-input type="date" name="tgl_terdaftar" model="tgl_terdaftar" placeholder="" />
                    <x-input-error for="tgl_terdaftar" />
                </div>
                <div class="sm:col-span-2">
                    <label for="vendor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Vendor
                    </label>
                    <select name="vendor" wire:model="vendor"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Vendor</option>
                        <option value="QR PTEN">QREN</option>
                        <option value="BNTBS">BNTBS</option>
                    </select>
                    @error('vendor')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="area_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Area
                    </label>
                    <select name="area_id" wire:model="area_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilh Area</option>
                        @foreach ($areas as $area)
                            <option value={{ $area->id }}>{{ $area->kecamatan }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="qris">
                        File QRIS</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="qris_help" wire:model="qris" type="file">
                    <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="qris_help">
                        PDF (Max. 5Mb)</p>
                    @error('qris')
                        <span class="text-xs italic text-red-500"> {{ $message }} </span>
                    @enderror
                    <div wire:loading>
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
            </div>
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Submit
            </button>
            <a type="button" href="{{ route('merchant.index') }}"
                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancel
            </a>
        </form>
    </div>
</div>
