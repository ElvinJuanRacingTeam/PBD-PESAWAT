<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerbanganRequest;
use App\Http\Requests\UpdatePenerbanganRequest;
use App\Models\Penerbangan;

class PenerbanganController extends Controller
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
    public function store(StorePenerbanganRequest $request)
    {
        Penerbangan::create($request->validated());
        // Add redirect or response
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbangan $penerbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbangan $penerbangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenerbanganRequest $request, Penerbangan $penerbangan)
    {
        $penerbangan->update($request->validated());
        // Add redirect or response
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbangan $penerbangan)
    {
        $penerbangan->delete();
        // Add redirect or response
    }
}
