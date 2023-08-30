<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link href="{{ url(asset('favicon.ico')) }}" rel="shortcut icon">

    <!-- Fonts -->
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CSS Styles -->
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles

    <!-- JS Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @if (session()->has('message'))
    <div x-data="{ isShow: true }">
        <div class="absolute top-0 right-0 w-2/3 m-3 md:w-1/3" x-show="isShow"
            x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition transform ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
            <div class="flex items-start p-3 space-x-2 bg-white border-blue-800 rounded-md shadow-lg">
                <svg class="flex-shrink-0 w-6 h-6 text-blue-800" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1"
                        d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03">
                    </path>
                </svg>
                <div class="flex-1 space-y-1">
                    <p class="text-base font-medium leading-6 text-blue-400">{{ session('message') }}</p>
                </div>
                <svg class="flex-shrink-0 w-5 h-5 text-blue-800 cursor-pointer" x-on:click="isShow = false"
                    stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1.2"
                        d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
    @endif

    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <x-logo class="w-auto h-16 mx-auto text-indigo-600" />

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-blue-700">
                        {{ config('app.name') }}
                    </h1>

                    <form method="POST" enctype="multipart/form-data" action="{{ route('fileupload.store') }}">
                        @csrf
                        <div class="flex items-center justify-center bg-grey-100">
                            <label
                                class="flex flex-col items-center w-64 px-2 py-2 tracking-wide text-blue-400 bg-white border border-blue-800 rounded-lg shadow-lg cursor-pointer hover:bg-blue-500 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2">Select a file</span>
                                <input class="hidden" id="uploadedfile" name="uploadedfile" type='file' />
                            </label>
                        </div>

                        <div class="mt-4 text-center align-middle">
                            <button
                                class="px-4 py-2 text-blue-400 bg-white border border-blue-800 rounded-lg shadow-lg hover:bg-blue-500 hover:text-white"
                                type="submit">Upload to S3</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
