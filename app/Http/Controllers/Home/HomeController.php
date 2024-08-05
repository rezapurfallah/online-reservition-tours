<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\tours\create_tours;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function indexPageTours($slug)
    {
        $pageTours = create_tours::where('slug', $slug)->firstOrFail();
        return view('toursPage.index-tourspage', compact('pageTours'));
    }

    public function reserveTour(Request $request, $slug)
    {
        $tour = create_tours::where('slug', $slug)->firstOrFail();

        $num_people = $request->input("num_people");

        if ($tour->reserved + $num_people <= $tour->capacity) {
            $tour->reserved += $num_people;
            $tour->save();

            // نمایش پیغام موفقیت
            return redirect()->route('tours-page', ['slug' => $slug])->with('success', 'رزرو با موفقیت انجام شد.');
        } else {
            // نمایش پیغام خطا
            return redirect()->route('tours-page', ['slug' => $slug])->with('error', 'ظرفیت کافی نیست.');
        }
    }

    public function bestTours(create_tours $tours)
    {
        $bestTours = $tours->where('is_best', 1)->get();
        return view('home.home', compact('bestTours'));
    }

    public function landTours(create_tours $landTours)
    {
        $landTours = $landTours->where('category_id', 3)->get();
        return view('home.tours.land-tour', compact('landTours'));
    }

    public function iranInTours(create_tours $iranInTours)
    {
        $iranInTours = $iranInTours->where('category_id', 1)->get();
        return view('home.tours.tourism-in-iran', compact('iranInTours'));
    }

    public function foreignTours(create_tours $foreignTours)
    {
        $foreignTours = $foreignTours->where('category_id', 2)->get();
        return view('home.tours.foreign-tours', compact('foreignTours'));
    }
}
