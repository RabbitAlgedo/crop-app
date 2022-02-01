<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['cultures' => Culture::get()]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Culture::create([
            'type' => $request->type,
            'user_id' => $request->user_id,
            'culture' => $request->culture,
            'termin' => $request->termin,
            'place_id' => $request->place_id,
            'delivery' => $request->delivery,
            'price' => $request->price,
            'weight' => $request->weight,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        return response()->json(['status' => 'Ви успішно створили нову пропозицію!', 'r' => $request]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Culture  $culture
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Culture $culture)
    {
        return response()->json([$culture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
