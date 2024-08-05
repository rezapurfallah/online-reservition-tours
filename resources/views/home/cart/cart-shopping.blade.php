@extends('layouts.app')

@section('body')
    <div class="max-w-4xl mx-auto p-6 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg shadow-lg mt-10" dir="rtl">
        <h2 class="text-2xl font-bold mb-6">سبد خرید</h2>

        <!-- لیست آیتم‌های سبد خرید -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900">
                <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="py-2 px-4 text-left">تصویر</th>
                    <th class="py-2 px-4 text-left">نام محصول</th>
                    <th class="py-2 px-4 text-left">تعداد</th>
                    <th class="py-2 px-4 text-left">قیمت واحد</th>
                    <th class="py-2 px-4 text-left">مجموع</th>
                    <th class="py-2 px-4 text-left">عملیات</th>
                </tr>
                </thead>
                <tbody id="cart-items">
                @foreach ($cart as $id => $details)
                    <tr class="border-b">
                        <td class="py-2 px-4"><img src="{{ asset('storage/' . $details['image']) }}" alt="Product Image" class="w-12 h-12 object-cover"></td>
                        <td class="py-2 px-4">{{ $details['name'] }}</td>
                        <td class="py-2 px-4">
                            <input type="number" value="{{ $details['quantity'] }}" min="1" class="w-20 p-1 border rounded text-center bg-gray-50 dark:bg-gray-700 dark:text-white" data-price="{{ $details['price'] }}" onchange="updateTotal(this)">
                        </td>
                        <td class="py-2 px-4">{{ number_format($details['price'], 0, '', ',') }} تومان</td>
                        <td class="py-2 px-4 item-total">{{ number_format($details['price'] * $details['quantity'], 0, '', ',') }} تومان</td>
                        <td class="py-2 px-4">
                            <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="removeItem(this)">حذف</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- مجموع قیمت‌ها و دکمه پرداخت -->
        <div class="mt-6 flex justify-between items-center">
            <span class="text-lg font-bold" id="total-price">مجموع کل: {{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)), 0, '', ',') }} تومان</span>
            <div>
                <a href="{{ route('home') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">انصراف</a>
                <form class="relative left-20 bottom-8" method="POST" action="{{ route('cart.checkout') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">پرداخت</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateTotal(element) {
            const price = parseInt(element.getAttribute('data-price'));
            const quantity = parseInt(element.value);
            const totalElement = element.closest('tr').querySelector('.item-total');
            const newTotal = price * quantity;

            totalElement.textContent = newTotal.toLocaleString() + ' تومان';

            updateTotalPrice();
        }

        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('#cart-items input[type="number"]').forEach(input => {
                const price = parseInt(input.getAttribute('data-price'));
                const quantity = parseInt(input.value);
                total += price * quantity;
            });

            document.getElementById('total-price').textContent = 'مجموع کل: ' + total.toLocaleString() + ' تومان';
        }

        function removeItem(button) {
            const row = button.closest('tr');
            row.remove();
            updateTotalPrice();
        }
    </script>

@endsection
