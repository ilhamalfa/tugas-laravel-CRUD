<?php

namespace App\Http\Controllers;

use App\Models\sekolah;
use App\Http\Requests\StoresekolahRequest;
use App\Http\Requests\UpdatesekolahRequest;

class SekolahController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresekolahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresekolahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(sekolah $sekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesekolahRequest  $request
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesekolahRequest $request, sekolah $sekolah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(sekolah $sekolah)
    {
        //
    }
}
