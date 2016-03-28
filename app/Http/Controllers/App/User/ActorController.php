<?php

namespace App\Http\Controllers\App\User;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Type;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActorController extends Controller
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
        $types = Type::whereNotIn('id', [1])->lists('description', 'id')->toArray();
        $results = User::with('Type')->whereNotIn('id', [1])->orderBy('id', 'DECS')->paginate(5);
        return view('app.user.actor.create', compact('results', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $results = User::create($request->all());
        Session::flash('message', $results->full_name . ' Añadido Con Exito');
        return Redirect::route('user.actor.create');
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
        $types = Type::lists('description', 'id')->toArray();
        $result = User::findOrFail($id);
        $results = User::with('Type')->orderBy('id', 'DECS')->paginate(5);
        return view('app.user.actor.edit', compact('result', 'types', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $result = User::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('user.actor.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->full_name . ' Fue Eliminado Con Exito ');
        return redirect()->route('user.actor.create');
    }
}
