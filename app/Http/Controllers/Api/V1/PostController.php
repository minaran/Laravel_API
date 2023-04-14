<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return                                 //necemo samo Post::all() vec cemo upotrebiti PostResource
        PostResource::collection( Post::all());                     
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create()                      // ne treba nam metod za kreiranje 
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
    $post = Post::create($request->validated());    // vratice nam model, ali upisimo ga 
                                                    // u varijablu pa mozemo ko json da ga vratimo
    return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    return PostResource::make($post);
    }

    /**
     * Show the form for editing the specified resource.   // ne treba nam za API
     */
    //public function edit(Post $post)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
    $post->update($request->validated());
        
    return PostResource::make($post);          // i ovde cemo ko json da ga vratimo
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    $post->delete();

    return response()->noContent();
    }
}
