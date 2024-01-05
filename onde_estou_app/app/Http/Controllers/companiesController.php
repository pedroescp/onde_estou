<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class companiesController extends Controller
{
    public function companies() {
        return view('Companies/list');
    }
}
