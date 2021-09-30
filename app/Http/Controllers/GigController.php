<?php

namespace App\Http\Controllers;

use App\Http\Requests\GigRequest;
use App\Http\Resources\GigResource;
use App\Http\Resources\GigResourceCollection;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $gigs = Gig::paginate();

        return (new GigResourceCollection($gigs))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GigRequest $request)
    {
        $validated = $request->validated();

        $gig = Gig::create($validated);

        return (new GigResource($gig))->response()->setStatusCode(Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gig  $gig
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Gig $gig)
    {
        return (new GigResource($gig))->response();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gig  $gig
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(GigRequest $request, Gig $gig)
    {
        $validated = $request->validated();

        $gig->update($validated);

        return (new GigResource($gig))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gig  $gig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        $gig->delete();

        return response(['message' => 'Gig deleted successfully!'])->setStatusCode(Response::HTTP_OK);

    }

    public function filter(Request $request)
    {
        $gigs = (new Gig())->filter($request);

        return (new GigResourceCollection($gigs))->response();
    }
}
