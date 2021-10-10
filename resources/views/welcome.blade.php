@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                    </a>

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        {{ config('app.name') }}
                    </h1>

                    <form method="POST" enctype="multipart/form-data" action="{{ route('fileupload.store') }}">
                        @csrf
                        <div class="flex items-center justify-center bg-grey-100">
                            <label class="flex flex-col items-center w-64 px-2 py-2 tracking-wide text-blue-400 bg-white border border-blue-800 rounded-lg shadow-lg cursor-pointer hover:bg-blue-500 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2">Select a file</span>
                                <input type='file' name="uploadedfile" id="uploadedfile" class="hidden" />
                            </label>
                        </div>

                        <div class="mt-4 text-center align-middle">
                            <button class="px-4 py-2 text-blue-400 bg-white border border-blue-800 rounded-lg shadow-lg hover:text-white hover:bg-blue-500" type="submit">Upload to S3</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
