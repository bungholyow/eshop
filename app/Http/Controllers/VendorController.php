<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    // public function vendor()
    // {
    //     // return view('auth.backend.layouts.master');

    // };

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function vendor()
    {
        return view('backend.index');
    }
}
