<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Lender;
use Illuminate\Http\Request;

class LenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lenders = Lender::all();
        return view('lenders.index', compact('lenders'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lender  $lender
     * @return \Illuminate\Http\Response
     */
    public function show(Lender $lender)
    {

        return view('lenders.show', compact('lender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lender  $lender
     * @return \Illuminate\Http\Response
     */
    public function edit(Lender $lender)
    {
        return view('lenders.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lender  $lender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lender $lender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lender  $lender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lender $lender)
    {
        //
    }
}
