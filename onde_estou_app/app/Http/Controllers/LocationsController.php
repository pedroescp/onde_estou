<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class locationsController extends Controller
{
    public function locations() {
        return view('Companies/list');
    }
}
