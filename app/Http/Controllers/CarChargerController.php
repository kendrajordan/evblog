<?php

namespace App\Http\Controllers;
use App\User;
use App\Car;
use App\Charger;
use App\CarCharger;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CarChargerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $car_chargers=CarCharger::orderBy('updated_at', 'desc')->get();
        $chargers =Charger::orderBy('updated_at', 'desc')->get();
        $cars =Car::orderBy('updated_at', 'desc')->get();
        return view('chargeLog.index',compact('car_chargers','cars','chargers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'This is where my charge log form will go.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Create a new charging session
      $car_charger = new \App\CarCharger;
      $car_charger->user_id = \Auth::id();
      $car_charger->car_id=request('car_id');
      $car_charger->charger_id=request('charger_id');
      $car_charger->start=request('start');
      $car_charger->end=request('end');
      $car_charger->save();

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
       $charger = App\Charger::find($id);
       $charger->cars()->updatingExistingPivot($car_id,$start,$end);
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
