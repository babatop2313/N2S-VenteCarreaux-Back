<?php

namespace App\Http\Controllers;

use App\Models\Dep;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredepRequest;
use App\Http\Requests\UpdatedepRequest;

class DepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredepRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function show(dep $dep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function edit(dep $dep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepRequest  $request
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepRequest $request, dep $dep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function destroy(dep $dep)
    {
        //
    }
}
