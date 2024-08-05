@extends('layouts.app')
@extends('Admin.navbar')

@php
    $hideNavbar = true;
@endphp

@section('body')
    <div class="max-w-4xl mx-auto p-6 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg shadow-lg mt-10" dir="rtl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">لیست کاربران</h2>
            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                افزودن ادمین جدید
            </a>
        </div>

        <!-- فرم جستجو -->
        <form action="{{ route('searchUsers') }}" method="GET" class="mb-6">
            <div class="flex">
                <input type="text" name="search" class="form-input flex-grow px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" placeholder="جستجوی کاربر...">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-r-md">جستجو</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900">
                <thead class="bg-gray-200 dark:text-white dark:bg-gray-700">
                <tr>
                    <th class="py-3 px-4 text-right">نام کامل</th>
                    <th class="py-3 px-4 text-right">ایمیل</th>
                    <th class="py-3 px-4 text-right">شماره تماس</th>
                    <th class="py-3 px-4 text-right">عملیات</th>
                </tr>
                </thead>
                <tbody id="user-list" class="dark:text-white">
                <!-- آیتم مثال -->
                @foreach($adminUser as $user)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-3 px-4">{{ $user->full_name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4">{{ $user->phone_number }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('adminMasterDestroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-purple-700 hover:bg-purple-900 text-white py-1 px-4 rounded" type="submit">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- اضافه کردن آیتم‌های بیشتر به همین شکل -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
