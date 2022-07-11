<?php

namespace App\Http\Controllers;

use App\Models\HasilUjian;
use App\Http\Requests\StoreHasilUjianRequest;
use App\Http\Requests\UpdateHasilUjianRequest;

class HasilUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasils = HasilUjian::all();
        return view('test.hasil', ['hasil' => $hasils, 'title' => 'Hasil Ujian']);
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
     * @param  \App\Http\Requests\StoreHasilUjianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHasilUjianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilUjian  $hasilUjian
     * @return \Illuminate\Http\Response
     */
    public function show(HasilUjian $hasilUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilUjian  $hasilUjian
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilUjian $hasilUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHasilUjianRequest  $request
     * @param  \App\Models\HasilUjian  $hasilUjian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHasilUjianRequest $request, HasilUjian $hasilUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilUjian  $hasilUjian
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilUjian $hasilUjian)
    {
        //
    }
}
