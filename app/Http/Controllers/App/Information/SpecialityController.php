<?php

namespace App\Http\Controllers\App\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialityEditRequest;
use App\Http\Requests\StageCreateRequest;
use App\Speciality;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SpecialityController extends Controller
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
        $results = Speciality::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.speciality.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialityEditRequest $request)
    {
        $results = Speciality::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.speciality.create');
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
        $result = Speciality::findOrFail($id);
        $results = Speciality::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.speciality.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialityEditRequest $request, $id)
    {
        $result = Speciality::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.speciality.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Speciality::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.speciality.create');
    }
}
