<div>
    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-6 mt-2">
        @foreach ($this->jukpems as $data)
            <div class="my-2 text-center">
                <img class="w-16 h-16 mx-auto p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                    src="/storage/{{ $data->foto }}" alt="Bordered avatar">

                <button wire:click="$dispatch('edit-pembantu', { id: {{ $data->id }} })"
                    data-modal-target="edit-pembantu-modal" data-modal-toggle="edit-pembantu-modal"
                    class="mt-2 items-center font-semibold text-md dark:text-gray-100 hover:text-purple-700 dark:hover:text-purple-600 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                    {{ $data->nama }}
                </button>
                <br>
                @if ($data->status == 1)
                    <span class="text-gray-500 dark:text-gray-400 font-semibold text-xs">
                        Active
                    </span>
                @else
                    <span class="text-red-500 dark:text-red-400 font-semibold text-xs">
                        Non-Active
                    </span>
                @endif

                @teleport('body')
                    <!-- Edit Pembantu Modal -->
                    @livewire('jukir.pembantu.edit-pembantu')
                @endteleport
            </div>
        @endforeach
    </div>
</div>
