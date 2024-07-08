<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <div>
                        <button wire:click="$emit('postSelected', 1)">Load Post 1</button>
                        <button wire:click="$emit('postSelected', 2)">Load Post 2</button>

                        <livewire:post />
                        <livewire:comments />
                        <livewire:post-list />
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
