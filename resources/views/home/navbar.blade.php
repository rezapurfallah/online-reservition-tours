<nav class=" border-gray-200 bg-customBlue justify-between">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a class="flex items-center space-x-3 rtl:space-x-reverse" href="https://flowbite.com/">
            <img alt="Flowbite Logo" class="h-8" src="https://flowbite.com/docs/images/logo.svg"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">طلوع</span>
        </a>
        <div>
        <span class="inline-block p-2 text-white rounded-full  bg-customBlue right-28 relative">
            <a href="{{route('cart')}}">
                       <svg class="w-3.5 h-3.5 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                       </svg>
                سبد خرید
            </a>
        </span>

        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
                <button type="button" onclick="window.location.href='{{ route('signin') }}'" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">ثبت نام</button>

                <button type="button" onclick="window.location.href='{{ route('signup') }}'" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">ورود</button>
            @endguest
            @if(auth()->check() && (auth()->user()->admin_master === 1 || auth()->user()->admin === 1))
                <button onclick="window.location.href='{{route('admin-panel')}}'" class="relative right-28  inline-flex items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-1.5 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">پنل مدیریت</span>
                    @endif
                    @auth
                        <button aria-expanded="false" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" data-dropdown-placement="bottom" data-dropdown-toggle="user-dropdown" id="user-menu-button" type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ auth()->user() && auth()->user()->profile_image ? asset('storage/profile_images/' . auth()->user()->profile_image) : 'https://cdn-icons-png.flaticon.com/512/3177/3177440.png' }}">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">

                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{Auth::user()->first_name}}</span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
                            </div>
                            <ul aria-labelledby="user-menu-button" class="py-2" dir="rtl">
                                <li>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="{{route('profile.edit')}}">پروفایل</a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="{{route('logout')}}">خروج</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    <button aria-controls="navbar-user" aria-expanded="false" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" data-collapse-toggle="navbar-user" type="button">
                        <span class="sr-only">Open main menu</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1h15M1 7h15M1 13h15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                    </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 relative right-36" id="navbar-user" dir="rtl">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-customBlue dark:border-gray-700">
                <li>
                    <a aria-current="page" class="block py-2 px-3 text-gray-900 rounded {{request()->routeIs('home') ? 'bg-blue-700 text-white' : 'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700'}}" href="{{route('home')}}">خانه</a>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded {{request()->routeIs('foreign-tours') ? 'bg-blue-700 text-white' : 'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700'}}" href="{{route('foreign-tours')}}">تور های خارجی</a>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded {{request()->routeIs('tourism-in-Iran') ? 'bg-blue-700 text-white' : 'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700'}}" href="{{ route('tourism-in-Iran') }}">گردشگری در ایران</a>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded {{request()->routeIs('land-tours') ? 'bg-blue-700 text-white' : 'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700'}}" href="{{ route('land-tours') }}">تور زمینی</a>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded {{ request()->routeIs('about-us') ? 'bg-blue-700 text-white' : 'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700'}}" href="{{route('about-us')}}">درباره ما</a>
                </li>
            </ul>
        </div>
    </div>
</nav>





@if(session('success'))
    <div id="toast-success" class="flex items-center justify-center fixed top-0 left-1/2 transform -translate-x-1/2 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
        <button id="close-toast" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif



{{--@section('script')--}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const toast = document.getElementById('toast-success');
        const closeButton = document.getElementById('close-toast');

        if (toast) {
            // حذف توست پس از 5 ثانیه
            setTimeout(() => {
                toast.style.display = 'none';
            }, 5000);

            // حذف توست با کلیک روی دکمه بستن
            closeButton.addEventListener('click', () => {
                toast.style.display = 'none';
            });
        }
    });

</script>
{{--@endsection--}}