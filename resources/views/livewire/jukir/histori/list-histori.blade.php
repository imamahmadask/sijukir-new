<div>
    <ol class="relative border-s border-gray-200 dark:border-gray-700">
        @foreach ($this->histories as $histori)
            <div wire:key="{{ $histori->id }}">
                <li class="mb-5 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-400">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-600 dark:text-gray-300">
                        {{ date('d F Y', strtotime($histori->tgl_histori)) }}
                    </time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{-- {{ $histori->jenis_histori }} --}}
                        <button wire:click="$dispatch('edit-histori', { id: {{ $histori->id }} })"
                            data-modal-target="edit-histori-modal" data-modal-toggle="edit-histori-modal"
                            class="items-center font-semibold text-md hover:text-purple-700 focus:outline-none focus:shadow-outline-purple"
                            aria-label="Edit">
                            {{ $histori->jenis_histori }}
                        </button>

                        @teleport('body')
                            <!-- Edit  Histori Modal -->
                            @livewire('jukir.histori.edit-histori')
                        @endteleport
                    </h3>
                    <p class="mb-4 text-base font-normal text-gray-700 dark:text-gray-50">
                        {{ $histori->histori }}
                    </p>
                </li>
            </div>
        @endforeach
    </ol>

</div>
