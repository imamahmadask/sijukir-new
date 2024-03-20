<div>
    {{-- Table Transaksi --}}
    <section class="bg-white dark:bg-gray-900 mt-5">
        <div class="py-8 px-5 mx-auto max-w-full lg:py-10 dark:bg-gray-800 shadow-lg rounded-lg">
            <div class="flex justify-between text-center align-middle">
                <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                    <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                        Transakasi Non-Tunai {{ $merchant_name }}
                    </span>
                </h2>
            </div>

            <!-- Filter -->
            <div class="my-4 overflow-x-auto relative bg-white shadow-md dark:bg-gray-800 rounded-lg">
                <div
                    class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="flex items-center w-full space-x-3 md:w-auto">
                        <div class="sm:w-20 w-full">
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="50" selected>50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <input type="date" wire:model.live="date_start"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <input type="date" wire:model.live="date_end"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jukir
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Transaksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Syslog
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Issuer Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($this->nontunais($merchant_id) as $nontunai)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 text-gray-900 whitespace-nowrap dark:text-white border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4">
                                    {{ $i++ }}
                                </th>
                                <td class="px-6 py-4 font-medium ">
                                    {{ $nontunai->merchant_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $nontunai->tgl_transaksi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $nontunai->syslog }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $nontunai->issuer_name }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp. {{ number_format($nontunai->total_nilai) }}
                                </td>
                                <td class="px-6 py-4">
                                    Succeed
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-50">
                            <td class="px-6 py-4 text-sm italic font-bold">#</td>
                            <td class="px-6 py-4 text-sm italic font-bold">
                                Total Transaksi ({{ number_format($this->nontunais($merchant_id)->count()) }})
                            </td>
                            <td class="px-6 py-4 text-sm"></td>
                            <td class="px-6 py-4 text-sm"></td>
                            <td class="px-6 py-4 text-sm"></td>
                            <td class="px-6 py-4 text-sm italic font-bold">
                                Rp. {{ number_format($this->nontunais($merchant_id)->sum('total_nilai')) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mt-4">
                {{ $this->nontunais($merchant_id)->links() }}
            </div>
        </div>
    </section>
</div>
