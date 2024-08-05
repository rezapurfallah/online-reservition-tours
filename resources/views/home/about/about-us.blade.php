@extends('layouts.app')



@section('body')
    <section class="dark:bg-gray-900">
        <div class="container px-6 py-12 mx-auto" dir="rtl">
            <div>
                <p class="font-medium text-blue-500 dark:text-blue-400">درباره ما</p>

                <h1 class="mt-2 text-2xl font-semibold text-gray-800 md:text-3xl dark:text-white">برای بهتر شدن کیفیت خدمات ما نظراتی دارید بیان کنید.</h1>

                <p class="mt-3 text-gray-500 dark:text-gray-400">اگر نظری درباره خدمات ما دارید لطفا ایمیل بفرستید یا تماس بگیرید.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 mt-10 lg:grid-cols-2">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                    <div>
                    <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 dark:bg-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                        <h2 class="mt-4 text-base font-medium text-gray-800 dark:text-white">Email</h2>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">برای خدمات بهتر برایمان ایمیل فرستید.</p>
                        <p class="mt-2 text-sm text-blue-500 dark:text-blue-400">www.tolooServices@gmail.com</p>
                    </div>

                    <div>
                    <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 dark:bg-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                        <h2 class="mt-4 text-base font-medium text-gray-800 dark:text-white">آدرس دفتر</h2>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">برای کسب اطلاعات بیشتر درباره ما میترانید به دفتر مان مراجعه کنید.</p>
                        <p class="mt-2 text-sm text-blue-500 dark:text-blue-400">مازندران ، ساری ، خیابان فرهنگ ، خیابان توکلی ، پاساژ پوژن ، طبقه ۲ ، دفتر خدماتی طلوع</p>
                    </div>

                    <div>
                    <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 dark:bg-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                        <h2 class="mt-4 text-base font-medium text-gray-800 dark:text-white">شماره تماس</h2>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">برای اطلاعات بیشتر با ما تماس حاصل نمایید.</p>
                        <p class="mt-2 text-sm text-blue-500 dark:text-blue-400">
                            <span style="direction: ltr; unicode-bidi: bidi-override;">011 3382 4303</span>
                        </p>
                    </div>
                </div>

                <div class="p-4 py-6 rounded-lg bg-gray-50 dark:bg-gray-800 md:p-8">
                    <form>
                        <div class="-mx-2 md:items-center md:flex">
                            <div class="flex-1 px-2">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">نام</label>
                                <input class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="نام شما" type="text"/>
                            </div>

                            <div class="flex-1 px-2 mt-4 md:mt-0">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">نام خانوادگی</label>
                                <input class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="نام خانوادگی شما" type="text"/>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">آدرس ایمیل</label>
                            <input class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="johndoe@example.com" type="email"/>
                        </div>

                        <div class="w-full mt-4">
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">پیام</label>
                            <textarea class="block w-full h-32 px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg md:h-56 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="پیام مورد نظر شما"></textarea>
                        </div>

                        <button class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            ارسال
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection