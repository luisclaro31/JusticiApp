<?php

namespace App\Http\Controllers;

use App\Municipality;
use App\Notification;
use App\Office;
use App\Speciality;
use App\Verdict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requestss;

use App\Http\Requests;

class VerdictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Requestss::all();
        $municipalities = Municipality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $specialities = Speciality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $offices = Office::specialities($request->get('speciality'))->orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $notification = Notification::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $results = Verdict::with('notification')->identification($request->get('identification'))->municipality($request->get('municipality'))->office($request->get('office'))->notification($request->get('notification'))->date($request->get('date'))->get();
        return view('verdict.index', compact('results', 'municipalities', 'specialities', 'offices', 'notification', 'query'));
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
