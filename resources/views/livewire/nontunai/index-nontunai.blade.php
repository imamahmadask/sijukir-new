<div>
    <div class="px-5 mb-4 h-max">
        <x-toast :message="session('success')" />

        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow-sm"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('nontunai.index') }}"
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
                        <a href="{{ route('nontunai.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Non-Tunai
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
                            List Non-Tunai</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">
            Transaksi Non-Tunai
        </h1>

        @livewire('nontunai.create-nontunai')

        <!-- Filter -->
        <div class="my-4 overflow-x-auto relative bg-white shadow-md dark:bg-gray-800 rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="flex items-center w-full space-x-3 md:w-auto">
                    <div class="sm:w-20 w-full">
                        <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="25" selected>25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <div class="w-full">
                        <select wire:model.live='filter'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Vendor</option>
                            <option value="QR PTEN">QREN</option>
                            <option value="BNTBS">BNTBS</option>
                        </select>
                    </div>
                    <input type="date" wire:model.live="date_start"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <input type="date" wire:model.live="date_end"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="w-full ">
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
                                class="block lg:w-48 w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search Non Tunai ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <h3 class="m-2 text-sm font-semibold text-gray-700 dark:text-gray-200">
                List Data Rekap Transaksi Non-Tunai <br />
                <span class="italic text-red-600 dark:text-yellow-400">
                    ({{ date('d-m-Y', strtotime($date_start)) }})
                    s/d
                    ({{ date('d-m-Y', strtotime($date_end)) }})
                </span>
            </h3>
            <button
                class="mr-3 px-1 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                type="button" wire:click="exportNonTunai">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M4.5 2A1.5 1.5 0 003 3.5v13A1.5 1.5 0 004.5 18h11a1.5 1.5 0 001.5-1.5V7.621a1.5 1.5 0 00-.44-1.06l-4.12-4.122A1.5 1.5 0 0011.378 2H4.5zm4.75 6.75a.75.75 0 011.5 0v2.546l.943-1.048a.75.75 0 011.114 1.004l-2.25 2.5a.75.75 0 01-1.114 0l-2.25-2.5a.75.75 0 111.114-1.004l.943 1.048V8.75z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="relative overflow-x-auto rounded-lg shadow-md bg-white dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Merchant
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah Transaksi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Nilai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($this->nontunai as $nontunai)
                        <tr wire:key="{{ $nontunai->id }}"
                            class="text-gray-900 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 dark:text-gray-200">
                            <td class="px-4 py-3">
                                {{ $no++ }}
                            </td>
                            <td scope="row" class="flex items-center py-4 pr-5 whitespace-nowrap ">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">
                                        {{ $nontunai->merchant_name }}
                                    </div>
                                    <div class="italic font-normal">
                                        {{ $nontunai->merchant_id }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                {{ $nontunai->jumlah }}
                            </td>
                            <td class="px-4 py-3">
                                Rp. {{ number_format($nontunai->total) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $nontunai->info }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a type="button"
                                    href="{{ route('nontunai.show', ['merchant_id' => $nontunai->merchant_id, 'start_date' => $date_start, 'end_date' => $date_end]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 14">
                                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                        </g>
                                    </svg>
                                    <span class="sr-only">Show</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="italic text-gray-700 dark:text-gray-200 dark:bg-gray-800 uppercase">
                        <td class="px-4 py-3 font-bold">#</td>
                        <td class="px-4 py-3 font-bold">Total</td>
                        <td class="px-4 py-3 font-bold text-center">
                            {{ number_format($this->nontunai->sum('jumlah')) }}</td>
                        <td class="px-4 py-3 font-bold">Rp.
                            {{ number_format($this->nontunai->sum('total')) }}</td>
                        <td class="px-4 py-3 font-bold"></td>
                        <td class="px-4 py-3 font-bold"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="mt-4">
            {{ $this->nontunai->links() }}
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successToast = document.getElementById('toast-success');

        function closeToast(toastElement) {
            if (toastElement) {
                toastElement.style.display = 'none';
            }
        }

        if (successToast) {
            setTimeout(function() {
                closeToast(successToast);
            }, 3000);
        }
    });
</script>
