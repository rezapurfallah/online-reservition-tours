<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart\FinallyShop;
use App\Models\tours\create_tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $slug)
    {
        $tour = create_tours::where('slug', $slug)->firstOrFail();

        // ذخیره اطلاعات تور در سبد خرید (جلسه)
        $cart = session()->get('cart', []);
        $cart[$tour->id] = [
            "name" => $tour->name,
            "price" => $tour->price,
            "quantity" => $request->input('num_people'),
            "image" => $tour->image,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'تور به سبد خرید اضافه شد. برای خرید نهایی به سبد خرید بروید.');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('home.cart.cart-shopping', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        // ذخیره اطلاعات سبد خرید در جدول finally_shop

        foreach ($cart as $id => $details) {
            FinallyShop::create([
                'tour_id' => $id,
                'user_id' => Auth::id(),
                'tour_name' => $details['name'],
                'quantity' => $details['quantity'],
                'price' => $details['price'],
                'user_full_name' => Auth::user()->FullName,
                'user_phone_number' => Auth::user()->phone_number
            ]);
        }

        // خالی کردن سبد خرید
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'پرداخت با موفقیت انجام شد.');
    }
}
