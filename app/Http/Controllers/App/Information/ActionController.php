<?php

namespace App\Http\Controllers\App\Information;


use App\Action;
use App\Http\Requests\ActionCreateRequest;
use App\Http\Requests\ActionEditRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActionController extends Controller
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
        $results = Action::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.action.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionCreateRequest $request)
    {
        $results = Action::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.action.create');
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
        $result = Action::findOrFail($id);
        $results = Action::orderBy('id', 'DECS')->paginate(5);
        return view('app.information.action.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActionEditRequest $request, $id)
    {
        $result = Action::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.action.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Action::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.action.create');
    }
}
