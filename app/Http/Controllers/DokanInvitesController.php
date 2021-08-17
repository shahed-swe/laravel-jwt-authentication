<?php

namespace App\Http\Controllers;

use App\Models\DokanInvites;
use Illuminate\Http\Request;

class DokanInvitesController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokanInvites  $dokanInvites
     * @return \Illuminate\Http\Response
     */
    public function show(DokanInvites $dokanInvites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DokanInvites  $dokanInvites
     * @return \Illuminate\Http\Response
     */
    public function edit(DokanInvites $dokanInvites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokanInvites  $dokanInvites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokanInvites $dokanInvites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokanInvites  $dokanInvites
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokanInvites $dokanInvites)
    {
        //
    }
}
