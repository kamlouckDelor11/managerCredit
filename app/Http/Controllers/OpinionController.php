<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Http\Requests\StoreOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class OpinionController extends Controller
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
    public function store(StoreOpinionRequest $request)
    {
        $request->validated();
        $token_credit = htmlspecialchars(strip_tags(stripslashes($request->tokenFolder)));
        $token_branch = htmlspecialchars(strip_tags(stripslashes($request->tokenBranch)));
        $content = htmlspecialchars(strip_tags(stripslashes($request->coment)));
        
        $opinion = new Opinion();
        $opinion->token = (string) Uuid::uuid4();
        $opinion->token_user = Auth::user()->token;
        $opinion->token_credit = $token_credit;
        $opinion->token_branch = $token_branch;
        $opinion->content = $content;

        $opinion->save();

        return response()->json(['message' => 'Commentaire envoyé !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOpinionRequest $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opinion $opinion)
    {
        //
    }
}
