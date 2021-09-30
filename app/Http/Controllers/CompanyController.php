<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyResourceCollection;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $company = Company::paginate();

        return (new CompanyResourceCollection($company))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $company = Company::create($validated);

        return (new CompanyResource($company))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company)
    {
        return (new CompanyResource($company))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $company->update($validated);

        return (new CompanyResource($company))->response()->setStatusCode(Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response(['message' => 'Company deleted successfully!']);
    }
}
