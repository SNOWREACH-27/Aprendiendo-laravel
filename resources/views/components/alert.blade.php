@props([
    'type' => 'info',
])

@php
    switch ($type) {
        case 'info':
            $class = 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';

            break;

        case 'danger':
            $class = 'text-red-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';
            break;

        case 'success':
            $class = 'text-green-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';
            break;

        case 'warning':
            $class = 'text-yellow-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';
            break;

        case 'dark':
            $class = 'text-white-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';
            break;

        default:
            $class = 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"';
            break;
    }
@endphp


<div class="p-4 mt-4 mb-4 text-sm {{ $class }}" role="alert">
    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
</div>
