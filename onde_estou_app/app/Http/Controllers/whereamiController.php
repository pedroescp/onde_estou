<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class whereamiController extends Controller
{
    public function locations() {
        return view('Companies/list');
    }
}
