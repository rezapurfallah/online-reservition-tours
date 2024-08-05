<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPanel;
use App\Models\tours\create_tours;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.create-tors');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer'],
            'price' => 'nullable|numeric|digits_between:1,10|min:0',
            'departure_date' => ['required', 'date'],
            'is_best' => ['required', 'in:بله,خیر'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);
        // تبدیل مقدار 'is_best' به مقدار بولین
        $data['is_best'] = $data['is_best'] == 'بله';

        // ذخیره کردن فایل آپلود شده
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        AdminPanel::create($data);

        return redirect()->route('admin-panel')->with('success', 'تور شما با موفقیت افزوده شد.');

    }

    public function adminMaster()
    {
        $adminUser = User::where('admin', 1)->get();
        return view('Admin.master-controller', compact('adminUser'));
    }

    public function adminMasterDestroy($id)
    {
        $user = User::find($id);
        if ($user && $user->admin == 1) {
            $user->admin = 0;
            $user->save();
        }
        return redirect()->route('master-controller')->with('success', 'ادمین با موفقیت حذف شد.');
    }

    public function fetchUsers()
    {
        $users = User::where('admin', 0)
            ->where('admin_master', 0)
            ->get(['id', 'FullName', 'email', 'phone_number']);
        return response()->json(['users' => $users]);
    }

    public function makeAdmin(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->admin = 1;
            $user->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function controlsTours(Request $request)
    {
        create_tours::where('departure_date', '<', Carbon::now()->subDays(3))->delete();
        $tours = create_tours::all();
        return view('Admin.master-controls-tors', compact('tours'));
    }

    public function deleteTour($id)
    {
        $tour = create_tours::findOrFail($id);
        $tour->delete();

        return redirect()->route('master-controls-tors')->with('success', 'تور با موفقیت حذف شد.');
    }

    public function updateTour(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'price' => 'nullable|numeric|digits_between:1,10|min:0',
            'description' => 'nullable|string'
        ]);

        $tour = create_tours::findOrFail($id);
        $tour->name = $request->input('name');
        $tour->capacity = $request->input('capacity');
        $tour->price = $request->input('price');
        $tour->departure_date = $request->input('departure_date');
        $tour->description = $request->input('description', $tour->description);
        $tour->save();

        return redirect()->route('master-controls-tors')->with('success', 'تور با موفقیت ویرایش شد.');
    }


    public function editTour($id)
    {
        $tour = create_tours::findOrFail($id);
        return view('Admin.admin-edit-tours', compact('tour'));
    }

    public function fetchTour(Request $request, $id)
    {
        $tour = create_tours::findOrFail($id);
        $tour->image = asset('storage/' . $tour->image);
        return response()->json(['tour' => $tour]);
    }
}
