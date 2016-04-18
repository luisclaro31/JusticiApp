<?php

namespace App\Http\Controllers\App\User;

use App\Type;

use App\Http\Requests\TypeCreateRequest;
use App\Http\Requests\TypeEditRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;


class TypeController extends Controller
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
        $results = Type::orderBy('id', 'DECS')->whereNotIn('id', [1, 2])->get();
        return view('app.user.type.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeCreateRequest $request)
    {
        $results = Type::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('user.type.create');
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
        $result = Type::findOrFail($id);
        $results = Type::orderBy('id', 'DECS')->get();
        return view('app.user.type.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeEditRequest $request, $id)
    {
        $result = Type::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('user.type.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Type::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('user.type.create');
    }
}
