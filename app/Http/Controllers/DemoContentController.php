<?php

namespace App\Http\Controllers;

use App\Http\Resources\DemoContentResource;
use App\Models\DemoContent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DemoContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $demoContent = DemoContentResource::collection(DemoContent::tableSearch($request->input('demoSearch')));

        return Inertia::render('Samples/Components/BackEndTable', [
            'demoContent' => $demoContent,
            'searchDataMainProducts' => DemoContent::getRelatedData('main_product_id', 'demo_contents')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
