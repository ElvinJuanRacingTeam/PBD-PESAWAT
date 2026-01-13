<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenumpangRequest;
use App\Http\Requests\UpdatePenumpangRequest;
use App\Models\Penumpang;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePenumpangRequest $request)
    {
        Penumpang::create($request->validated());
        // Add redirect or response
    }

    /**
     * Display the specified resource.
     */
    public function show(Penumpang $penumpang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penumpang $penumpang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenumpangRequest $request, Penumpang $penumpang)
    {
        $penumpang->update($request->validated());
        // Add redirect or response
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penumpang $penumpang)
    {
        $penumpang->delete();
        // Add redirect or response
    }
}
