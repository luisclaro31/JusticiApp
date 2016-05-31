<?php

namespace App\Http\Controllers\App\Report;

use App\Http\Controllers\Controller;
use App\ProcessAudiences;
use App\ProcessMovements;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Vsmoraes\Pdf\Pdf;

class ReportController extends Controller
{

    private $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function helloWorld()
    {
        $html = view('pdfs.example1')->render();

        return $this->pdf
            ->load($html)
            ->show();
    }

    public function diary()
    {
        $now = Carbon::now();
        $now = $now->toDateString();

        $process_movements = ProcessMovements::with('Process', 'Notification', 'Process.ProcessActors.User')->where('expiration_date', '>=' , $now)->orderBy('expiration_date', 'ASC')->paginate();
        $process_audiences = ProcessAudiences::with('Process', 'office', 'Process.ProcessActors.User')->where('date', '>=' , $now)->orderBy('date', 'ASC')->paginate();

        $html = view('app.report.diary', compact('process_movements', 'process_audiences'));

        return $this->pdf
            ->load($html)
            ->show();

    }


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
