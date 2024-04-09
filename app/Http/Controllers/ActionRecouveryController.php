<?php

namespace App\Http\Controllers;

use App\Models\ActionRecouvery;
use App\Http\Requests\StoreActionRecouveryRequest;
use App\Http\Requests\UpdateActionRecouveryRequest;
use App\Models\Upaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Ramsey\Uuid\Uuid;

class ActionRecouveryController extends Controller
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
    public function store(StoreActionRecouveryRequest $request, Upaid $upaid)
    {
        $request->validated();
        $document =time().'_'.Auth::user()->branch->branchname.'.'.$request->recouveryUpaidActionDoc->extension();
        $path = 'document/upaid/'; 
        $recouveryUpaidActionObject = htmlspecialchars(strip_tags(stripslashes($request->recouveryUpaidActionObject)));
        
        Storage::putFileAs($path, new file($request->recouveryUpaidActionDoc), $document);

        $actionRecouvery = new ActionRecouvery();

        $actionRecouvery->title = $recouveryUpaidActionObject;
        $actionRecouvery->path = $document;
        $actionRecouvery->token_upaid = $upaid->token;
        $actionRecouvery->token = (string) Uuid::uuid4();

        $actionRecouvery->save();

        return response()->json(['message'=>'Réalisé avec succès !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ActionRecouvery $actionRecouvery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActionRecouvery $actionRecouvery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActionRecouveryRequest $request, ActionRecouvery $actionRecouvery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActionRecouvery $actionRecouvery)
    {
        //
    }
}
