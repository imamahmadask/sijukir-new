@props(['type', 'name', 'model', 'placeholder'])

<div>
    <input type="{{ $type }}" name="{{ $name }}" wire:model="{{ $model }}"
        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="{{ $placeholder }}">
</div>
