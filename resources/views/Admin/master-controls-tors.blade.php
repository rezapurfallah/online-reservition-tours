@extends('layouts.app')
@extends('Admin.navbar')

@php
    $hideNavbar = true;
@endphp

@section('style')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection

@section('body')
    <div class="container mx-auto p-4 mt-10 bg-gray-50 dark:text-white dark:bg-gray-800 shadow-lg rounded-lg" dir="rtl">
        <h2 class="text-2xl font-bold mb-6 text-center">مدیریت تورها</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="py-2 px-4 text-gray-700 dark:text-gray-300">نام تور</th>
                    <th class="py-2 px-4 text-gray-700 dark:text-gray-300">ظرفیت</th>
                    <th class="py-2 px-4 text-gray-700 dark:text-gray-300">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tours as $tour)
                    <tr class="border-b dark:border-gray-700">
                        <td class="py-2 px-4 text-gray-900 dark:text-gray-100">{{ $tour->name }}</td>
                        <td class="py-2 px-4 text-gray-900 dark:text-gray-100">{{ $tour->capacity }}</td>
                        <td class="py-2 px-4 text-gray-900 dark:text-gray-100 flex justify-center space-x-2 rtl:space-x-reverse">
                            <form action="{{ route('tours.delete', $tour->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">حذف</button>
                            </form>
                            <form action="{{ route('tours.fetch', $tour->id) }}" method="GET" class="viewForm">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="submitViewForm(this)">مشاهده</button>
                            </form>
                            <a href="{{ route('admin.editTour', $tour->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">ویرایش</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Viewing Tour Details -->
    <div id="viewModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 py-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-right overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-right w-full">
                            <h3 class="text-2xl leading-6 font-medium text-gray-900 text-center mb-4" id="viewTourName"></h3>
                            <img id="viewTourImage" class="w-full h-48 object-cover mb-4 rounded-md" src="" alt="Tour Image">
                            <p class="text-sm text-gray-700 mb-2" id="viewTourCapacity"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourdeparture_date"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourPrice"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourDescription"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourDuration"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourRequirements"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourServices"></p>
                            <p class="text-sm text-gray-700 mb-2" id="viewTourNotes"></p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal('viewModal')">
                        بستن
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function submitViewForm(button) {
            const form = button.closest('form');
            fetch(form.action)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('viewTourName').innerText = data.tour.name;
                    document.getElementById('viewTourImage').src = data.tour.image; // URL تصویر تور
                    document.getElementById('viewTourCapacity').innerText = 'ظرفیت: ' + data.tour.capacity;
                    document.getElementById('viewTourdeparture_date').innerText = 'تاریخ رفت: ' + data.tour.departure_date;
                    // ابتدا بخش قیمت را نمایان کنید
                    document.getElementById('viewTourPrice').style.display = 'block';

// سپس بررسی کنید که آیا قیمت وجود دارد یا نه
                    if (data.tour.price) {
                        document.getElementById('viewTourPrice').innerText = 'قیمت: ' + data.tour.price.toLocaleString() + ' تومان';
                    } else {
                        document.getElementById('viewTourPrice').style.display = 'none';
                    }

                    document.getElementById('viewTourDescription').innerText = 'توضیحات: ' + data.tour.description;

                    openModal('viewModal');
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
