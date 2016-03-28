<?php

namespace App\Http\Controllers\App\Information;


use App\Http\Controllers\Controller;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationEditRequest;
use App\Location;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
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
        $results = Location::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.location.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationCreateRequest $request)
    {
        $results = Location::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.location.create');
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
        $result = Location::findOrFail($id);
        $results = Location::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.location.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationEditRequest $request, $id)
    {
        $result = Location::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.location.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Location::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.location.create');
    }
}
