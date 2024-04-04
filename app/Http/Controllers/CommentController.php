<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class CommentController extends Controller
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
    public function store(StoreCommentRequest $request)
    {
        $request->validated();
        $token_credit = htmlspecialchars(strip_tags(stripslashes($request->tokenFolder)));
        $token_branch = htmlspecialchars(strip_tags(stripslashes($request->tokenBranch)));
        $content = htmlspecialchars(strip_tags(stripslashes($request->coment)));
        
        $comment = new Comment();
        $comment->token = (string) Uuid::uuid4();
        $comment->token_user = Auth::user()->token;
        $comment->token_credit = $token_credit;
        $comment->token_branch = $token_branch;
        $comment->content = $content;

        $comment->save();

        return response()->json(['message' => 'Commentaire envoyé !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
