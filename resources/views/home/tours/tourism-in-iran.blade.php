@extends('layouts.app')

@section('body')
    <div class="mt-8">
        @foreach($iranInTours as $iran)
            <div class="flex justify-end pr-10">
                <div class="flex border border-gray-200 rounded-lg shadow bg-gray-800 dark:border-gray-700 w-[97%]" dir="rtl">
                    <img class="w-48 h-48 object-cover rounded-lg" src="{{ asset('storage/' . $iran->image) }}" alt=""/>
                    <div class="p-5">
                        <h5 class="mb-20 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $iran->name }}</h5>
                        <a href="{{ route('tours-page' , ['slug' => $iran->slug]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            توضیحات بیشتر
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
@endsection