<?php

namespace App\Http\Controllers;

use App\User;
use App\Charger;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChargerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chargers =Charger::orderBy('updated_at', 'desc')->get();
          return view('chargers.index',compact('chargers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "Display a form for creating a charger";
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
        $validateData= $request->validate([
          'name' => 'required|unique:chargers|max:255',

          'charge_rate'=>'required'
        ]);
        $charger = new Charger();
        $charger->name = request('name');
        $charger->options= request('options');
        $charger->flat_rate= request('flat_rate');
        $charger->charge_rate = request('charge_rate');
        $charger->fee1 = request('fee1');
        $charger->fee2 = request('fee2');
        $charger->fee1_hr=request('fee1_hr');
        $charger->fee1_kwh=request('fee1_kwh');
        $charger->feeoption=request('feeoption');
        $charger->user_id = \Auth::id();
        $charger->save();
        $request->session()->flash('status', 'You have added a charging station!');
        return redirect()->back();
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
        $chargers=\App\Charger::find($id);
        return view('chargers.edit',compact('chargers'));
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
        $charger =Charger::find($id);
        $charger->name  = $request->input('name');
        $charger->options= $request->input('options');
        $charger->flat_rate = $request->input('flat_rate');
        $charger->user_id = \Auth::id();
        $charger->charge_rate = $request->input('charge_rate');
        $charger->fee1 = $request->input('fee1');
        $charger->fee2 = $request->input('fee2');
        $charger->fee1_hr = $request->input('fee1_hr');
        $charger->fee1_kwh = $request->input('fee1_kwh');
        $charger->feeoption = $request->input('feeoption');
        $charger->save();
        return redirect('/chargers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id, Request $request)
     {
         //
         $charger =Charger::find($id);
         $charger->delete();
         $request->session()->flash('status','Charging Station '.$charger->name.' successfully deleted'.'<a href=chargers/'.$charger->id.'/restore>UNDO</a>');
         return redirect('/chargers');
     }
     public function restore($id){
       $charger = Charger::withTrashed()->find($id)->restore();
          return redirect ('chargers');
     }
}
