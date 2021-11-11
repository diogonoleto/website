<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Website/Index', [
            'websites' => fn () => Website::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Website/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebsiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteRequest $request)
    {
        Website::create($request->all());
        return redirect()->route('website.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        return Inertia::render('Website/Show', [
            'website' => $website
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        return Inertia::render('Website/Edit', [
            'website' => $website
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\WebsiteRequest  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteRequest $request, Website $website)
    {
        $website->update($request->all());
        return redirect()->route('website.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        $website->delete();
        return redirect()->route('website.index');
    }
}
