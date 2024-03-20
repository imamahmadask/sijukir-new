<div>
    <div class="px-5">
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
            </ol>
        </nav>

        <div class="mb-3">
            <select id="filterYear" wire:model="filterYear"
                class="lg:w-24 w-full bg-white border border-gray-200 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <h3 class="font-semibold text-2xl text-gray-800 dark:text-white">Perolehan</h3>
        <div class="grid w-full grid-cols-1 gap-5 mt-4 lg:grid-cols-2 xl:grid-cols-4">
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-yellow-400 dark:bg-yellow-400">
                        <svg class="w-7 h-7 text-white dark:text-yellow-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 11.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">
                            Target 2023
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div data-popover-target="popover-default"
                        class="p-3 mr-5 rounded-full bg-yellow-400 dark:bg-yellow-400">
                        <svg class="w-7 h-7 text-white dark:text-yellow-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 6.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">
                            Total Pencapaian
                        </h3>
                        <div data-popover id="popover-default" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-100 dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Informasi Tambahan</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>
                                    Belum termasuk pendapatan yang ditangguhkan sebesar <br>
                                    <b>
                                        Rp. 60.000.000
                                    </b>
                                </p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-yellow-400 dark:bg-yellow-400">
                        <svg class="w-7 h-7 text-white dark:text-yellow-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">Rp.
                            5.000.000.000</span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Selisih Target</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-yellow-400 dark:bg-yellow-400">
                        <svg class="w-7 h-7 dark:text-yellow-50 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 13 6-6m-5-.5h.01m2.98 7H11m1.007-11.313a2.75 2.75 0 0 0 2.1.87 2.745 2.745 0 0 1 2.837 2.837 2.749 2.749 0 0 0 .87 2.1 2.747 2.747 0 0 1 0 4.014 2.748 2.748 0 0 0-.87 2.1 2.746 2.746 0 0 1-2.837 2.837 2.75 2.75 0 0 0-2.1.87 2.748 2.748 0 0 1-4.014 0 2.75 2.75 0 0 0-2.1-.87 2.744 2.744 0 0 1-2.837-2.837 2.749 2.749 0 0 0-.87-2.1 2.747 2.747 0 0 1 0-4.014 2.75 2.75 0 0 0 .87-2.1 2.745 2.745 0 0 1 2.838-2.837 2.749 2.749 0 0 0 2.1-.87 2.748 2.748 0 0 1 4.013 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            50%
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Persentase</h3>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-green-500 dark:bg-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 dark:text-yellow-50 text-white icon icon-tabler icon-tabler-qrcode"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                            </path>
                            <path d="M7 17l0 .01"></path>
                            <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                            </path>
                            <path d="M7 7l0 .01"></path>
                            <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                            </path>
                            <path d="M17 7l0 .01"></path>
                            <path d="M14 14l3 0"></path>
                            <path d="M20 14l0 .01"></path>
                            <path d="M14 14l0 3"></path>
                            <path d="M14 20l3 0"></path>
                            <path d="M17 17l3 0"></path>
                            <path d="M20 17l0 3"></path>
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 8.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Non-Tunai</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-green-500 dark:bg-green-600">
                        <svg class="w-7 h-7 dark:text-green-50 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.905 1.316 15.633 6M18 10h-5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5m0-5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h15a1 1 0 0 0 1-1v-3m-6.367-9L7.905 1.316 2.352 6h9.281Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 8.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Tunai</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-green-500 dark:bg-green-600">
                        <svg class="w-7 h-7 dark:text-green-50 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M16.5 7A2.5 2.5 0 0 1 19 4.5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2.5a2.5 2.5 0 1 1 0 5V12a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V9.5A2.5 2.5 0 0 1 16.5 7Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 100.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Berlangganan</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-green-500 dark:bg-green-600">
                        <svg class="w-7 h-7 dark:text-green-50 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 0
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Insidentil</h3>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-blue-700 dark:bg-blue-500">
                        <svg class="w-7 h-7 text-white dark:text-blue-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            340.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Jumlah Transaksi</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-blue-700 dark:bg-blue-500">
                        <svg class="w-7 h-7 text-white dark:text-blue-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 2.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Total Netto</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-blue-700 dark:bg-blue-500">
                        <svg class="w-7 h-7 text-white dark:text-blue-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M2 19h16m-8 0V5m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4 8l-2.493 5.649A1 1 0 0 0 2.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L4 8Zm0 0V6m12 2-2.493 5.649A1 1 0 0 0 14.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L16 8Zm0 0V6m-4-2.8c3.073.661 3.467 2.8 6 2.8M2 6c3.359 0 3.192-2.115 6.012-2.793" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 40.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">AVG Pendapatan Harian
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-blue-700 dark:bg-blue-500">
                        <svg class="w-7 h-7 text-white dark:text-blue-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M2 19h16m-8 0V5m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4 8l-2.493 5.649A1 1 0 0 0 2.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L4 8Zm0 0V6m12 2-2.493 5.649A1 1 0 0 0 14.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L16 8Zm0 0V6m-4-2.8c3.073.661 3.467 2.8 6 2.8M2 6c3.359 0 3.192-2.115 6.012-2.793" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            1.100
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Avg Transaksi Harian
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5 mb-4 border-gray-300">

        <h3 class="font-semibold text-2xl text-gray-800 dark:text-white">Potensi</h3>
        <div class="grid w-full grid-cols-1 gap-5 mt-4 lg:grid-cols-2 xl:grid-cols-4">
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-indigo-600 dark:bg-indigo-700">
                        <svg class="w-7 h-7 text-white dark:text-indigo-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 30.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Potensi Harian</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-indigo-600 dark:bg-indigo-700">
                        <svg class="w-7 h-7 text-white dark:text-indigo-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 1.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Potensi Bulanan</h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-indigo-600 dark:bg-indigo-700">
                        <svg class="w-7 h-7 text-white dark:text-indigo-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. 12.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Potensi Tahunan
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-indigo-600 dark:bg-indigo-700">
                        <svg class="w-7 h-7 text-white dark:text-indigo-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            Rp. -5.000.000.000
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Potensi - Pendapatan
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5 mb-4 border-gray-300">

        <h3 class="font-semibold text-2xl text-gray-800 dark:text-white">Lainnya</h3>
        <div class="grid w-full grid-cols-1 gap-5 mt-4 lg:grid-cols-2 xl:grid-cols-4">
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-orange-500 dark:bg-orange-600">
                        <svg class="w-7 h-7 text-white dark:text-orange-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            922
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Jumlah Jukir
                            <i>(Active)</i>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-orange-500 dark:bg-orange-600">
                        <svg class="w-7 h-7 text-white dark:text-orange-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 21">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M8 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path
                                    d="M13.8 12.938h-.01a7 7 0 1 0-11.465.144h-.016l.141.17c.1.128.2.252.3.372L8 20l5.13-6.248c.193-.209.373-.429.54-.66l.13-.154Z" />
                            </g>
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            743
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Jumlah Titik
                            <i>(Active)</i>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-orange-500 dark:bg-orange-600">
                        <svg class="w-7 h-7 text-white dark:text-orange-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            15
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Jumlah Korlap
                        </h3>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="p-3 mr-5 rounded-full bg-orange-500 dark:bg-orange-600">
                        <svg class="w-7 h-7 text-white dark:text-orange-50" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                        </svg>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl md:text-2xl dark:text-white">
                            5
                        </span>
                        <h3 class="text-base font-semibold mt-2 text-gray-700 dark:text-gray-200">Jumlah Pengaduan
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Top 5 Jukir --}}
        <div class="relative mt-10 overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-2xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Top 5 Jukir
                    <p class="mt-2 text-sm font-normal text-gray-800 dark:text-gray-100">
                        Juru Parkir dengan setoran retribusi parkir terbanyak di Kota Mataram.
                    </p>
                </caption>
                <thead
                    class="text-xs text-green-700 dark:text-green-50 uppercase bg-green-200 dark:bg-green-700 whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Jukir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titik Parkir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Non-Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Saepudin
                            </div>
                            <div class="italic font-normal">
                                Jukir Dishub 269
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Toko Mirasa
                            </div>
                            <div class="italic font-normal">
                                Jl. AA Gede Ngurah
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 0
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Muhalibin
                            </div>
                            <div class="italic font-normal">
                                Jukir Dishub 269
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Bank BCA Pejanggik
                            </div>
                            <div class="italic font-normal">
                                Jl. Pejanggik
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 0
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Hardianto
                            </div>
                            <div class="italic font-normal">
                                Jukir Dishub 269
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-base font-semibold">
                                Toko Nefos
                            </div>
                            <div class="italic font-normal">
                                Jl. AA Gede Ngurah
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 0
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 125.000.000
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Data By Area --}}
        <div class="relative mt-10 overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-2xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Data Area
                    <p class="mt-2 text-sm font-normal text-gray-800 dark:text-gray-100">
                        Kecamatan dengan setoran retribusi parkir terbanyak di Kota Mataram.
                    </p>
                </caption>
                <thead
                    class="text-xs text-yellow-700 dark:text-yellow-800 uppercase bg-yellow-200 dark:bg-yellow-300 whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kecamatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Jukir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Non-Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4 font-semibold text-base">
                            Cakranegara
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            200
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 1.000.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 1.010.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
                        <td class="px-6 py-4 font-semibold text-base">
                            Mataram
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            150
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 9.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 250.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 259.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4 font-semibold text-base">
                            Ampenan
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            144
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 300.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 310.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4 font-semibold text-base">
                            Selaparang
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            60
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 300.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 310.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
                        <td class="px-6 py-4 font-semibold text-base">
                            Sandubaya
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            90
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 300.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 310.000.000
                        </td>
                    </tr>
                    <tr
                        class="text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
                        <td class="px-6 py-4 font-semibold text-base">
                            Sekarbela
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            80
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 300.000.000
                        </td>
                        <td class="px-6 py-4 font-semibold text-base">
                            Rp. 310.000.000
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr
                        class="text-base text-gray-800 bg-gray-100 border-b dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200 font-medium whitespace-nowrap">
                        <th class="px-6 py-4">#Total</th>
                        <th class="px-6 py-4">900</th>
                        <th class="px-6 py-4">Rp. 50.000.000</th>
                        <th class="px-6 py-4">Rp. 1.000.000.000</th>
                        <th class="px-6 py-4">Rp. 1.050.000.000</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- Data By Area --}}
        <div class="relative mt-10 overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-2xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Data Bulan
                    <p class="mt-2 text-sm font-normal text-gray-800 dark:text-gray-100">
                        Rincian pendapatan realisasi berdasarkan bulan
                    </p>
                </caption>
                <thead class="text-xs text-purple-700 dark:text-purple-50 uppercase bg-purple-200 dark:bg-purple-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Bulan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berlangganan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Trx Non-Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Non-Tunai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ach %
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-base font-semibold text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4">
                            Jan-2023
                        </td>
                        <td class="px-6 py-4">
                            Rp. 20.000.000
                        </td>
                        <td class="px-6 py-4">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4">
                            1234
                        </td>
                        <td class="px-6 py-4">
                            Rp. 1.010.000.000
                        </td>
                        <td class="px-6 py-4">
                            Rp. 1.010.000.000
                        </td>
                        <td class="px-6 py-4">
                            5%
                        </td>
                    </tr>
                    <tr
                        class="text-base font-semibold text-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <td class="px-6 py-4">
                            Feb-2023
                        </td>
                        <td class="px-6 py-4">
                            Rp. 20.000.000
                        </td>
                        <td class="px-6 py-4">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4">
                            1.234
                        </td>
                        <td class="px-6 py-4">
                            Rp. 1.010.000.000
                        </td>
                        <td class="px-6 py-4">
                            Rp. 1.010.000.000
                        </td>
                        <td class="px-6 py-4">
                            5%
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr
                        class="text-base font-semibold text-gray-800 bg-gray-100 border-b dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200">
                        <th class="px-6 py-4">#Total</th>
                        <th class="px-6 py-4">Rp. 20.000.000</th>
                        <th class="px-6 py-4">Rp. 50.000.000</th>
                        <th class="px-6 py-4">1.234</th>
                        <th class="px-6 py-4">Rp. 1.050.000.000</th>
                        <th class="px-6 py-4">Rp. 1.050.000.000</th>
                        <th class="px-6 py-4">11%</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
