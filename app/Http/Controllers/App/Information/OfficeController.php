<?php

namespace App\Http\Controllers\App\Information;

use App\Location;
use App\Office;
use App\Speciality;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = Office::with('Speciality', 'Location')->orderBy('id', 'DECS')->paginate(5);
        $speciality = Speciality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $location = Location::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        return view('app.information.office.create', compact('results', 'speciality', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $results = Office::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.office.create');
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
        $result = Office::findOrFail($id);
        $results = Office::orderBy('id', 'DECS')->paginate(5);
        $speciality = Speciality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $location = Location::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        return view('app.information.office.edit', compact('result', 'results', 'speciality', 'location'));
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
        $result = Office::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.office.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Office::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.office.create');
    }
}
