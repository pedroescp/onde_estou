<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sectorsController extends Controller
{
    public function sectors() {
        return view('Companies/list');
    }
}
