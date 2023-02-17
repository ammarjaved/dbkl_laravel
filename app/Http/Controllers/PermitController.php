<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use App\Http\Requests\StorePermitRequest;
use App\Http\Requests\UpdatePermitRequest;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Permit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function show(Permit $permit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function edit(Permit $permit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermitRequest  $request
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermitRequest $request, Permit $permit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permit $permit)
    {
        //
    }
}
