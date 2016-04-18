<?php

namespace App\Http\Controllers\App\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelCreateRequest;
use App\Http\Requests\TravelEditRequest;
use App\Travel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TravelController extends Controller
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
        $results = Travel::orderBy('id', 'DECS')->get();
        return view('app.information.travel.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelCreateRequest $request)
    {
        $results = Travel::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.travel.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Travel::findOrFail($id);
        $results = Travel::orderBy('id', 'DECS')->get();
        return view('app.information.travel.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelEditRequest $request, $id)
    {
        $result = Travel::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.travel.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Travel::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.travel.create');
    }
}
