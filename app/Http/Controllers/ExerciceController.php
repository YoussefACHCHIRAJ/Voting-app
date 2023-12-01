<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciceRequest;
use App\Http\Requests\UpdateExerciceRequest;
use App\Models\Exercice;
use App\Models\Vote;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("exercice.index");
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
    public function store(StoreExerciceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercice $exercice)
    {

        return view('exercice.show', [
            'exercice' => $exercice,
            'votesCount' => $exercice->votes()->count(),
            'backUrl' => url()->previous() !== url()->full() ? url()->previous() : route('exercice.index')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciceRequest $request, Exercice $Exercice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercice $Exercice)
    {
        //
    }




}
