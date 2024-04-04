<?php

namespace App\Http\Controllers;

use App\Models\Garantie;
use App\Http\Requests\StoreGarantieRequest;
use App\Http\Requests\UpdateGarantieRequest;
use App\Models\Credit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Ramsey\Uuid\Uuid;

class GarantieController extends Controller
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
    public function store(StoreGarantieRequest $request, Credit $credit)
    {
        $request->validated();

        $path =time().'.'.$request->pathGarantie->extension(); 
        $nameFolder = 'dossier/garantie';
        Storage::putFileAs($nameFolder, new file($request->pathGarantie), $path);

        $natureGarantie = htmlspecialchars(strip_tags(stripslashes($request->natureGarantie)));
        $valeurGarantie = htmlspecialchars(strip_tags(stripslashes($request->valeurGarantie)));
        $pathGarantie = htmlspecialchars(strip_tags(stripslashes($request->pathGarantie)));

        $garantie = new Garantie();

        $garantie->token = (string) Uuid::uuid4();
        $garantie->credit_token = $credit->token;
        $garantie->natureGarantie = $natureGarantie;
        $garantie->valueGarantie = $valeurGarantie;
        $garantie->pathGarantie = $path;

        $garantie->save();

        return response()->json(['message'=>'Réalisé avec succès !']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Garantie $garantie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garantie $garantie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGarantieRequest $request, Garantie $garantie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garantie $garantie)
    {
        //
    }
}
