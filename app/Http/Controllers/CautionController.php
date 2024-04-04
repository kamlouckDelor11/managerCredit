<?php

namespace App\Http\Controllers;

use App\Models\Caution;
use App\Http\Requests\StoreCautionRequest;
use App\Http\Requests\UpdateCautionRequest;
use App\Models\Credit;
use Ramsey\Uuid\Uuid;

class CautionController extends Controller
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
    public function store(StoreCautionRequest $request, Credit $credit)
    {
        $request->validated();
        $tokenCredit = $credit->token;
        $nomCaution = htmlspecialchars(strip_tags(stripslashes($request->nomCaution)));
        $activiteCaution = htmlspecialchars(strip_tags(stripslashes($request->activiteCaution)));
        $localisationCaution = htmlspecialchars(strip_tags(stripslashes($request->localisationCaution)));
        $localisationActivite = htmlspecialchars(strip_tags(stripslashes($request->localisationActivite)));
        $sexeCaution = htmlspecialchars(strip_tags(stripslashes($request->sexeCaution)));
        $lienCaution = htmlspecialchars(strip_tags(stripslashes($request->lienCaution)));
        $ageCaution = htmlspecialchars(strip_tags(stripslashes($request->ageCaution)));
        $cautionPhone = htmlspecialchars(strip_tags(stripslashes($request->cautionPhone)));

        $caution = new Caution();

        $caution->token = (string) Uuid::uuid4();
        $caution->nomCaution = $nomCaution;
        $caution->ageCaution = $ageCaution;
        $caution->sexeCaution = $sexeCaution;
        $caution->lien = $lienCaution;
        $caution->activiteCaution = $activiteCaution;
        $caution->localisationCaution = $localisationCaution;
        $caution->localisationActivite = $localisationActivite;
        $caution->telephoneCaution = $cautionPhone;
        $caution->credit_token = $tokenCredit;

        $caution->save();

        return response()->json(['message'=>'Réalisé avec succès !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Caution $caution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caution $caution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCautionRequest $request, Caution $caution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caution $caution)
    {
        //
    }
}
