@extends('layouts.app')
@extends('Admin.navbar')
@php
    $hideNavbar = true;
@endphp

@section('body')
    <style>
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 1.5rem; /* Adjust this value if needed */
            background-position: left center;
            background-repeat: no-repeat;
            background-size: 1rem;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' viewBox='0 0 16 16'%3E%3Cpath stroke='%23737483' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M4.75 6l3.25 3.25L11.25 6'%3E%3C/path%3E%3C/svg%3E");
        }
    </style>
    <div class="h-auto m-3 p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg overflow-auto" dir="rtl">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">افزودن تور جدید</h2>
            @if(session('success'))
                <script>
                    alert('{{ session('success') }}');
                </script>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin-panel.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- عکس تور -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        عکس تور
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" id="image" type="file">
                </div>
                <!-- اسم تور و تعداد جای خالی -->
                <div class="flex mb-4">
                    <div class="w-1/2 pr-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            اسم تور
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" value="{{ old('name') }}" type="text" placeholder="اسم تور">
                    </div>
                    <div class="w-1/2 pl-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="capacity">
                            تعداد جای خالی
                        </label>
                        <input class="mr-1.5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="capacity" name="capacity" value="{{ old('capacity') }}" type="number" placeholder="تعداد جای خالی">
                    </div>
                </div>

                <!-- تاریخ رفت تور و جزء بهترین تورها -->
                <div class="flex mb-4">
                    <div class="w-1/2 pr-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="departure_date">
                            تاریخ رفت تور
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departure_date" type="text" name="departure_date" value="{{ old('departure_date') }}" placeholder="تاریخ رفت تور" onfocus="(this.type='date')">
                    </div>
                    <div class="w-1/2 pl-2 mr-12">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="is_best">
                            جزء بهترین تور ها
                        </label>
                        <div class="flex items-center">
                            <input id="best-tour-yes" type="radio" name="is_best" value="بله" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('is_best') == 'بله' ? 'checked' : '' }}>
                            <label for="best-tour-yes" class="ml-2 block text-sm text-gray-700">بله</label>
                            <input id="best-tour-no" type="radio" name="is_best" value="خیر" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 ml-4" {{ old('is_best') == 'خیر' ? 'checked' : '' }}>
                            <label for="best-tour-no" class="ml-2 block text-sm text-gray-700">خیر</label>
                        </div>
                    </div>
                </div>
                <!-- کدام بخش سایت -->
                <div class="flex mb-4">
                    <div class="w-1/2 pr-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tour-category">
                            برای کدام بخش سایت
                        </label>
                        <select id="category_id" name="category_id" class="custom-select shadow appearance-none border rounded w-3/6 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">یک گزینه را انتخاب کنید</option>
                            <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>تور داخلی</option>
                            <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>تور خارجی</option>
                            <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>تور زمینی</option>
                        </select>
                    </div>
                    <div class="w-1/2 pl-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                            قیمت تور
                        </label>
                        <input class="mr-1.5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" value="{{ old('price') }}" type="number" placeholder="مبلغ تور">
                    </div>
                </div>
                <!-- توضیحات و خدمات تور -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        توضیحات و خدمات تور
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" placeholder="توضیحات و خدمات تور"></textarea>
                </div>
                <!-- دکمه ها -->
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        افزودن تور
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
