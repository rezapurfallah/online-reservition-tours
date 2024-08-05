@extends('layouts.app')

@section('body')
    <div class="max-w-3xl mx-auto p-4 mt-10 bg-gray-50 dark:text-white dark:bg-gray-800 shadow-lg rounded-lg " dir="rtl">
        <h2 class="text-2xl font-bold mb-6 text-center">ویرایش پروفایل</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- پیش‌نمایش عکس پروفایل -->
            <div class="mb-4">
                @if($user->profile_image)
                    <img id="profile_image_preview" src="{{ asset('storage/profile_images/' . $user->profile_image) }}" class="mt-4 w-32 rounded-full object-cover mx-auto">
                @else
                    <img id="profile_image_preview" src="#" alt="Profile Preview" class="mt-4 w-32 h-32 rounded-full object-cover mx-auto hidden">
                @endif
                <label class="block text-white text-sm font-bold mb-2 mt-4" for="profile_image">
                    عکس پروفایل
                </label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none" onchange="previewImage(event)">
            </div>

            <!-- فیلد نام -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="first_name">
                    نام
                </label>
                <input type="text" id="first_name" value="{{ old('first_name' , $user->first_name) }}" name="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- فیلد نام خانوادگی -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="last_name">
                    نام خانوادگی
                </label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name' , $user->last_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- فیلد ایمیل -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="email">
                    ایمیل
                </label>
                <input type="email" id="email" name="email" value="{{ old('email' , $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- فیلد شماره تماس -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="phone_number">
                    شماره تماس
                </label>
                <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number' , $user->phone_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- فیلد رمز عبور -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="password">
                    رمز عبور
                </label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- فیلد تکرار رمز عبور -->
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="password_confirmation">
                    تکرار رمز عبور
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-950 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- دکمه ثبت -->
            <div class="flex items-center justify-center space-x-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline left-1 relative" type="submit">
                    ذخیره تغییرات
                </button>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="window.location.href='{{ url('/') }}'">
                    انصراف
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile_image_preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

