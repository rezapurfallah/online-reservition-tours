@extends('layouts.app')

@section('body')
    <div class="container mx-auto p-4 mt-10 bg-gray-50 dark:text-white dark:bg-gray-800 shadow-lg rounded-lg flex flex-wrap">
        <!-- بخش راست: توضیحات تور و فرم رزرو -->
        <div class="w-full md:w-1/2 md:pr-16">
            <div class="mb-4">
                <h2 class="text-3xl font-bold mb-4">{{ $pageTours->name }}</h2>
                <p class="text-lg mb-4">{{ $pageTours->description }}</p>
                <p class="text-lg font-bold" id="tourPrice" data-price="{{ $pageTours->price }}">تومان {{ number_format($pageTours->price , 0, '' , '.') }}</p>
                <p class="text-lg mb-4"><strong>تاریخ حرکت: </strong>{{ $pageTours->departure_date }}</p>
            </div>

            <form method="POST" action="{{ route('cart.add', $pageTours->slug) }}">
                @csrf
                <div class="mb-4">
                    <label for="num_people" class="block mb-2 text-lg font-bold">تعداد نفرات: </label>
                    <input type="number" id="num_people" name="num_people" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="1" required>
                    <h5 id="totalPrice" class="hidden text-lg font-bold mt-4"></h5>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">رزرو تور</button>
            </form>


            @if (session('success'))
                <div class="mt-4 bg-green-500 text-white p-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mt-4 bg-red-500 text-white p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- بخش چپ: عکس و اطلاعات تور -->
        <div class="w-full md:w-1/2 flex flex-col items-center">
            <img src="{{ asset('storage/' . $pageTours->image) }}" class="w-full h-64 object-cover rounded-lg shadow-md mb-4">
            <div class="mb-4 text-lg">
                <span class="font-bold">ظرفیت کل: </span>{{ $pageTours->capacity }}<br>
                <span class="font-bold">ظرفیت رزرو شده: </span>{{ $pageTours->reserved }}<br>
                <span class="font-bold">ظرفیت خالی: </span>{{ $pageTours->capacity - $pageTours->reserved }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('num_people').addEventListener('input', function () {
            const pricePerPerson = document.getElementById('tourPrice').getAttribute('data-price');
            const numPeople = this.value;
            const totalPriceElement = document.getElementById('totalPrice');

            if (numPeople && numPeople > 0) {
                const totalPrice = (numPeople * pricePerPerson).toLocaleString();
                totalPriceElement.innerText = 'مجموع کل: ' + totalPrice + ' تومان';
                totalPriceElement.classList.remove('hidden');
            } else {
                totalPriceElement.classList.add('hidden');
            }
        });

        function showBookingMessage() {
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }
    </script>
@endsection
