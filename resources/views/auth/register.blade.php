@extends('layouts.app')
<body class="dark:bg-gray-900 h-screen flex items-center justify-center">
<form dir="rtl" class="max-w-md w-full mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800" method="post" action="{{route('signin.store')}}">
    @csrf
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder=" " value="{{old('first_name')}}" autocomplete="first_name" required type="text" autofocus/>
            <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="first_name">نام</label>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder=" " value="{{old('last_name')}}" required type="text" autocomplete="last_name" autofocus/>
            <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 float-end" for="last_name">نام خانوادگی</label>
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>
    <div>
        <div class="relative z-0 w-full mb-5 group">
            <input aria-describedby="email_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="email" name="email" placeholder=" " value="{{old('email')}}" required type="email" autocomplete="email" autofocus/>
            <label class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto" for="email">ایمیل</label>
        </div>
        <p id="email_success_help" class="hidden -mt-2 text-base text-green-600 dark:text-green-400"> ایمیل وارد شده معتبر است.</p>
        <p id="email_error_help" class="hidden -mt-2 text-base text-red-600 dark:text-red-400"> ایمیل وارد شده در دیتابیس موجود است.</p>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('password') is-invalid @enderror" id="password" name="password" placeholder=" " required type="password"/>
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="password">پسورد</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder=" " required type="password"/>
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="password_confirmation">تکرار پسورد</label>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>

    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="phone_number" name="phone_number" placeholder=" " required type="tel"/>
            <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="phone_number">شماره تماس</label>
        </div>
    </div>
    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">ثبت نام</button>
    <button type="button" onclick="window.location.href='{{ route('signup') }}'" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mr-10">ورود</button>

</form>
</body>

@section('script')
    <script>
        document.getElementById('email').addEventListener('blur', function () {
            const email = this.value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // ارسال درخواست به سرور برای بررسی ایمیل
            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest', // افزودن هدر درخواست AJAX
                    'X-CSRF-TOKEN': token, // افزودن هدر CSRF token
                },
                body: JSON.stringify({email: email}),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const emailField = document.getElementById('email');
                    const emailSuccessHelp = document.getElementById('email_success_help');
                    const emailErrorHelp = document.getElementById('email_error_help');

                    if (data.exists) {
                        // اگر ایمیل در دیتابیس وجود داشته باشد
                        emailField.classList.add('border-red-600', 'dark:border-red-500', 'focus:border-red-600', 'dark:focus:border-red-500');
                        emailField.classList.remove('border-gray-300', 'dark:border-gray-600', 'focus:border-blue-600', 'dark:focus:border-blue-500', 'border-green-600', 'dark:border-green-500', 'focus:border-green-600', 'dark:focus:border-green-500');
                        emailErrorHelp.classList.remove('hidden');
                        emailErrorHelp.classList.add('block');
                        emailSuccessHelp.classList.add('hidden');
                        emailSuccessHelp.classList.remove('block');
                    } else {
                        // اگر ایمیل در دیتابیس وجود نداشته باشد
                        emailField.classList.add('border-green-600', 'dark:border-green-500', 'focus:border-green-600', 'dark:focus:border-green-500');
                        emailField.classList.remove('border-gray-300', 'dark:border-gray-600', 'focus:border-blue-600', 'dark:focus:border-blue-500', 'border-red-600', 'dark:border-red-500', 'focus:border-red-600', 'dark:focus:border-red-500');
                        emailSuccessHelp.classList.remove('hidden');
                        emailSuccessHelp.classList.add('block');
                        emailErrorHelp.classList.add('hidden');
                        emailErrorHelp.classList.remove('block');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection

@php
    $hideNavbar = true;
@endphp


