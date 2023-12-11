<div>
    <div class="px-5 mb-4 h-max">
        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('tunai.index') }}"
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
                        <a href="{{ route('analisa.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Analisa
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
                            List Analisa</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Analisa Korlap
        </h1>

        <!-- Filter -->
        <div class="my-4 overflow-x-auto relative bg-white shadow-md dark:bg-gray-800 rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="flex items-center w-full space-x-3 md:w-auto">
                    <div class="sm:w-20 w-full">
                        <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="100">100</option>
                            <option value="250">250</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <div class="w-full">
                        <select wire:model.live="filterKorlap" name="filterKorlap"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($korlaps as $korlap)
                                <option value="{{ $korlap->id }}">{{ $korlap->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="month" wire:model.live="bulan" name="bulan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="w-full">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" wire:model.live="search"
                                class="block lg:w-48 w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search Berlangganan ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <h3 class="m-2 text-md font-semibold text-gray-700 dark:text-gray-200">
                Korlap :
                <span
                    class="px-2 py-1 font-semibold text-md leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{ $this->namaKorlap }}
                </span>

            </h3>
            <h3 class="m-2 text-md font-semibold text-gray-700 dark:text-gray-200">
                Setoran Bulan :
                <span class="italic text-red-600 dark:text-yellow-400">
                    ({{ date('M-Y', strtotime($bulan)) }})
                </span>
            </h3>
        </div>
        <hr class="border-2 border-indigo-500 my-2">

        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
                    <tr class="items-center whitespace-nowrap">
                        <th scope="col" class="px-6 py-3">
                            Nama data
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titik Parkir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Potensi Harian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Potensi Bulanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jml Trx
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Setoran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kurang Setor
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->analisa as $data)
                        <tr wire:key="{{ $data->id }}"
                            class="items-center whitespace-nowrap text-gray-900 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 dark:text-gray-200">
                            <td class="px-6 py-4">
                                <div class="text-base font-semibold">
                                    <a href="/admin/jukir/{{ $data->id }}" class="hover:text-blue-500"
                                        target="_blank">
                                        {{ $data->nama_jukir }}
                                    </a>
                                </div>
                                <div class="italic font-normal">
                                    @if ($data->ket_jukir == 'Active')
                                        {{ $data->merchant_name }}
                                    @else
                                        {{ $data->kode_jukir }}
                                    @endif
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                <div class="text-base font-semibold">
                                    {{ $data->titik_parkir }}
                                </div>
                                <div class="italic font-normal">
                                    {{ $data->lokasi_parkir }}
                                </div>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($data->PotensiHarian) }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($data->PotensiBulanan) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($data->Total_Tap) }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($data->status = 'Non-Tunai')
                                    @if ($data->Total == null)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 rounded-full dark:text-red-700">
                                            Rp.
                                            {{ number_format($data->Total) }}
                                        </span>
                                    @elseif($data->Total < $data->PotensiBulanan)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-500 rounded-full dark:text-yellow-400">
                                            Rp.
                                            {{ number_format($data->Total) }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 rounded-full dark:text-green-700">
                                            Rp.
                                            {{ number_format($data->Total) }}
                                        </span>
                                    @endif
                                @elseif($data->status = 'Tunai')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 rounded-full dark:text-red-700">
                                        Rp. 0
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($data->Total == null)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        Rp. {{ number_format($data->PotensiBulanan) }}
                                    </span>
                                @elseif ($data->PotensiBulanan - $data->Total > 0)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                        Rp. {{ number_format($data->PotensiBulanan - $data->Total) }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Rp. 0
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
