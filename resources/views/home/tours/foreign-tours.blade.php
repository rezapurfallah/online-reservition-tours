@extends('layouts.app')

@section('body')
    <div class="mt-8">

        @foreach($foreignTours as $foreign)
            <div class="flex flex-wrap justify-center space-x-20">
                <div class="max-w-sm   border border-gray-200 rounded-lg shadow bg-customBlue dark:border-gray-700">
                    <img class="rounded-t-lg px-1.5 py-2.5" src="{{ asset('storage/' . $foreign->image) }}" alt=""/>
                    <div class="p-5" dir="rtl">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $foreign->name }}</h5>
                        <a href="{{ route('tours-page' , ['slug' => $foreign->slug]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            توضیحات بشتر
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    @endforeach
@endsection