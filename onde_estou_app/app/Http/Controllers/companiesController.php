<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class companiesController extends Controller
{
    public function index(Companies $companies)
    {
        $companies = $companies->all();
        return view('companies/index', compact('companies'));
    }

    public function create(Companies $companies)
    {
        return view('companies/create');
    }

    public function store(Request $request)
    {
        Companies::create([
            'name' => $request->name,
            'parent_id' => null,
        ]);

        return redirect('/companies');
    }

    public function show(string|int $id)
    {
        if (!$companie = Companies::find($id)) {
            return redirect()->back();
        }

        return view('/companies/show', compact('companie'));
    }

    public function edit(Companies $companie, string|int $id)
    {
        if (!$companie = Companies::find($id)) {
            return redirect()->back();
        }

        return view('/companies/edit', compact('companie'));
    }

    public function update(Request $request, Companies $companie, string|int $id)
    {
        if (!$companie = Companies::find($id)) {
            return redirect()->back();
        }

        $companie->update($request->only([
            'name'
        ]));

        return redirect()->route('companies');
    }
}
