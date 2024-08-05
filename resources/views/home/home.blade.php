@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.app')

@section('sidebar')

    <div id="gallery" class="relative w-full my-8" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://www.jowhareh.com/images/Jowhareh/galleries_7/large_699a1075-9083-4133-816b-55f31d2e4e77.webp" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image 1">
            </div>
            <!-- Item 2 -->
            <div class=" duration-700 ease-in-out" data-carousel-item>
                <img src="https://cdn01.eavar.com/2019/12/724d99d2-5fef-4d56-8f12-6b6f59bf8f0a.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image 2">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://fa.shafaqna.com/media/2016/02/Meet-the-famous-tourist-attractions-in-Europe-Photos-irannaz-com-4.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image 3">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://cdn.alibaba.ir/ostorage/alibaba-mag/wp-content/uploads/2020/04/pic-24-Oia-in-Santorini-Greece.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image 4">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://letsgouni.com/api/upload/blog/upload_4b3675ac634b94ca54a26a1f4ff31a7dc.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image 5">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev style="left: 430px">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button" class=" absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-nextc style="right: 430px">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>
    <hr class="border-t-4 border-gray-900 rounded-lg shadow-lg my-6 mx-auto w-4/5">

@endsection


@section('body')
    <div class="flex flex-wrap justify-center space-x-20">
        @foreach($bestTours  as $best)
            <div class="max-w-sm  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg px-1.5 py-2.5" src="{{ asset('storage/' . $best->image) }}" alt=""/>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" dir="rtl">{{ $best->name }}</h5>
                    <a href="{{ route('tours-page' , ['slug' => $best->slug]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        توضیحات بشتر
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

