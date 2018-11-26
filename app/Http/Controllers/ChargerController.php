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
          'per_kwh'=>'required',
          'cost'=>'required',
          'charge_rate'=>'required'
        ]);
        $charger = new Charger();
        $charger->name = request('name');
        $charger->per_kwh= request('per_kwh');
        $charger->cost= request('cost');
        $charger->charge_rate = request('charge_rate');
        $charger->user_id = \Auth::id();
        $charger->save();
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
        $charger=\App\Charger::find($id);
        return view('chargers.edit',compact('charger'));
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
        $charger->per_kwh= $request->input('per_kwh');
        $charger->cost = $request->input('cost');
        $charger->user_id = \Auth::id();
        $charger->charge_rate = $request->input('charge_rate');
        $charger->save();
        return redirect('/chargers');
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
