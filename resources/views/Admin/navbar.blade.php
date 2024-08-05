@php use Illuminate\Support\Facades\Auth; @endphp
<div class="flex justify-center items-center" dir="rtl">
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            @if(\auth()->check() && auth()->user()->admin_master === 1 )
                <li class="me-2">
                    <a href="{{route('master-controller')}}" class="inline-block p-4 border-b-2 {{ request()->routeIs('master-controller') ? 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">مدیریت ادمین ها</a>
                </li>
            @endif
            <li class="me-2">
                <a href="{{route('admin-panel')}}" class="inline-block p-4 border-b-2 {{ request()->routeIs('admin-panel') ? 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}" aria-current="page">افزودن تور</a>
            </li>
            <li class="me-2">
                <a href="{{route('master-controls-tors')}}" class="inline-block p-4 border-b-2 {{ request()->routeIs('master-controls-tors') ? 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">مدیریت تور ها</a>
            </li>
            <li class="me-2">
                <a href="{{route('reservation-tors')}}" class="inline-block p-4 border-b-2 {{ request()->routeIs('reservation-tors') ? 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">تور های رزرو شده</a>
            </li>

        </ul>
    </div>
    <button type="button" onclick="window.location.href='{{route('home')}}'" class="relative right-72 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-2">خروج</button>
</div>
