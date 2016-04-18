<?php

namespace App\Http\Controllers\App\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationCreateRequest;
use App\Http\Requests\NotificationEditRequest;
use App\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
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
        $results = Notification::orderBy('id', 'DECS')->get();
        return view('app.information.notification.create', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationCreateRequest $request)
    {
        $results = Notification::create($request->all());
        Session::flash('message', $results->description . ' Añadido Con Exito');
        return Redirect::route('info.notification.create');
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
        $result = Notification::findOrFail($id);
        $results = Notification::orderBy('id', 'DECS')->get();
        return view('app.information.notification.edit', compact('result', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotificationEditRequest $request, $id)
    {
        $result = Notification::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('info.notification.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Notification::findOrFail($id);
        $result->delete();

        Session::flash('message', 'El Registro '. $result->description . ' Fue Eliminado Con Exito ');
        return redirect()->route('info.notification.create');
    }
}
