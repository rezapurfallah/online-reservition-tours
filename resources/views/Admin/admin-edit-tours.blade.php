@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('body')
    <div class="container mx-auto p-4 mt-10 bg-gray-50 dark:text-white dark:bg-gray-800 shadow-lg rounded-lg" dir="rtl">
        <h2 class="text-2xl font-bold mb-6">ویرایش تور</h2>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
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
        <form action="{{ route('tours.update', $tour->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="editName" class="block text-gray-700 dark:text-gray-300">نام تور:</label>
                <input type="text" id="editName" name="name" class="w-full px-3 text-gray-950 py-2 border rounded" value="{{ old('name', $tour->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="editCapacity" class="block text-gray-700 dark:text-gray-300">ظرفیت:</label>
                <input type="number" id="editCapacity" name="capacity" class="w-full px-3 text-gray-950 py-2 border rounded" value="{{ old('capacity', $tour->capacity) }}" required>
            </div>
            <div class="mb-4">
                <label for="editDepartureDate" class="block text-gray-700 dark:text-gray-300">تاریخ حرکت:</label>
                <input type="date" id="editDepartureDate" name="departure_date" class="w-full text-gray-950 px-3 py-2 border rounded" value="{{ old('departure_date', $tour->departure_date) }}" required>
            </div>
            @if($tour->price !== null)
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 dark:text-gray-300">قیمت تور:</label>
                    <input type="number" id="price" name="price" class="w-full px-3 text-gray-950 py-2 border rounded" value="{{ old('price', $tour->price) }}" required>
                </div>
            @endif
            <div class="mb-4">
                <label for="editDescription" class="block text-gray-700 dark:text-gray-300">توضیحات:</label>
                <textarea id="editDescription" name="description" class="w-full px-3 text-gray-950 py-2 border rounded h-[500px]">{{ old('description', $tour->description) }}</textarea>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">ذخیره تغییرات</button>
            <a href="{{ route('master-controls-tors') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 mr-2.5">لغو</a>
        </form>
    </div>
@endsection
