@extends('layouts.app')
@extends('Admin.navbar')
@php
    $hideNavbar = true;
@endphp

@section('body')
    <div class="max-w-4xl mx-auto p-6 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg shadow-lg mt-10" dir="rtl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">لیست کاربران</h2>
            <button onclick="openUserPopup()" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                افزودن ادمین جدید
            </button>
        </div>

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
                @foreach($adminUser as $user)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-3 px-4">{{ $user->FullName }}</td>
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
                </tbody>
            </table>
        </div>
    </div>

    <div id="user-popup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50" dir="rtl">
        <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg w-3/4 max-h-full overflow-y-auto">
            <div class="mb-4 flex justify-between items-center">
                <input type="text" id="search-box" class="w-full p-2 border border-gray-300 rounded" placeholder="جستجو بر اساس نام کامل...">
                <button onclick="closeUserPopup()" class="ml-4 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                    بستن
                </button>
            </div>
            <table class="min-w-full bg-white dark:bg-gray-900">
                <thead class="bg-gray-200 dark:text-white dark:bg-gray-700">
                <tr>
                    <th class="py-3 px-4 text-right">نام کامل</th>
                    <th class="py-3 px-4 text-right">ایمیل</th>
                    <th class="py-3 px-4 text-right">شماره تماس</th>
                    <th class="py-3 px-4 text-right">عملیات</th>
                </tr>
                </thead>
                <tbody id="all-user-list" class="dark:text-white">
                {{-- لیست کاربران --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openUserPopup() {
            fetchUsers();
            document.getElementById('user-popup').classList.remove('hidden');
        }

        function closeUserPopup() {
            document.getElementById('user-popup').classList.add('hidden');
        }

        function fetchUsers() {
            fetch('{{ route("fetchUsers") }}')
                .then(response => response.json())
                .then(data => {
                    const userList = document.getElementById('all-user-list');
                    userList.innerHTML = '';
                    data.users.forEach(user => {
                        const row = document.createElement('tr');
                        row.classList.add('border-b', 'border-gray-200', 'dark:border-gray-700');
                        row.innerHTML = `
                            <td class="py-3 px-4">${user.FullName}</td>
                            <td class="py-3 px-4">${user.email}</td>
                            <td class="py-3 px-4">${user.phone_number}</td>
                            <td class="py-3 px-4">
                                <button class="bg-green-700 hover:bg-green-900 text-white py-1 px-4 rounded" onclick="makeAdmin(${user.id})">افزودن ادمین</button>
                            </td>
                        `;
                        userList.appendChild(row);
                    });
                });
        }

        function makeAdmin(userId) {
            fetch(`{{ route("makeAdmin") }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({id: userId})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('کاربر به ادمین تبدیل شد');
                        fetchUsers();
                    } else {
                        alert('خطایی رخ داد');
                    }
                });
        }

        document.getElementById('search-box').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#all-user-list tr');
            rows.forEach(row => {
                const fullName = row.getElementsByTagName('td')[0].innerText.toLowerCase();
                if (fullName.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
