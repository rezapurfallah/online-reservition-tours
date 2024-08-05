<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function HomeAccessesNavbar(Request $request)
    {
        $request->Navbar = true;

        $this->middleware('NavbarAccesses');
        return view('layouts.app');
    }

    private function middleware(string $string) {}
}
