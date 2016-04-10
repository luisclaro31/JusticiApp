<?php

namespace App\Http\Controllers\App\Execution;

use App\Action;
use App\Municipality;
use App\Notification;
use App\Office;
use App\OfficeStages;
use App\Part;
use App\Process;
use App\ProcessActors;
use App\ProcessAudiences;
use App\ProcessOffices;
use App\Speciality;
use App\Stage;
use App\State;
use App\Travel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Request as Requestss;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Process::with('Action', 'ProcessActors', 'ProcessActors.User')->paginate();

        return view('app.execution.process.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $stages = Stage::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $travels = Travel::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $municipalities = Municipality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $actions = Action::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $results = Action::orderBy('id', 'DECS')->paginate(5);
        return view('app.execution.process.create', compact('results', 'municipalities', 'actions', 'states', 'stages', 'travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $results = Process::create($request->all());
        Session::flash('message', $results->identification . ' Añadido Con Exito');
        return Redirect::route('execution.process.show', $results->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $query = Requestss::all();
        $parts = Part::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $notifications = Notification::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $actors = User::whereNotIn('type_id', [1,2])->orderBy('full_name', 'ASC')->lists('full_name', 'id')->toArray();
        $lawyers = User::where('type_id', [2])->orderBy('full_name', 'ASC')->lists('full_name', 'id')->toArray();
        $specialities = Speciality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $offices = Office::specialities($request->get('speciality'))->orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $office_stages = OfficeStages::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $process_actors = ProcessActors::with('Process', 'User', 'Part')->where('process_id', $id)->orderBy('part_id', 'ASC')->get();
        $process_offices = ProcessOffices::with('Office', 'Stage')->where('process_id', $id)->orderBy('stage_id', 'ASC')->get();
        $process_audiences = ProcessAudiences::with('Office')->where('process_id', $id)->orderBy('date', 'DECS')->get();
        $origin_office = ProcessOffices::where([ ['process_id',$id], ['stage_id',1], ])->orderBy('id', 'DESC')->first();
        $result = Process::with('State', 'Stage', 'Action', 'Travel', 'Municipality')->findOrFail($id);
        return view('app.execution.process.show', compact('result', 'parts', 'notifications', 'actors', 'lawyers', 'process_actors', 'process_offices', 'process_audiences', 'specialities', 'query', 'offices', 'office_stages', 'origin_office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Process::findOrFail($id);
        $states = State::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $stages = Stage::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $travels = Travel::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $municipalities = Municipality::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $actions = Action::orderBy('description', 'ASC')->lists('description', 'id')->toArray();
        $results = Action::orderBy('id', 'DECS')->paginate(5);
        return view('app.execution.process.edit', compact('result', 'results', 'municipalities', 'actions', 'states', 'stages', 'travels'));
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
        $result = Process::findOrFail($id);
        $result->fill($request->all());
        $result->save();
        return Redirect::route('execution.process.show', $result->id);
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
