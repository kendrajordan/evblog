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
    //     dd([$request('start'), $request->input('start')]);
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Seperate data between users

        $car_chargers=\Auth::user()->car_chargers()->orderBy('updated_at', 'desc')->get();

        $chargers =\Auth::user()->chargers()->withTrashed()->orderBy('updated_at', 'desc')->get();
        $cars =\Auth::user()->cars()->withTrashed()->orderBy('updated_at', 'desc')->get();
        $user=\Auth::user();
        return view('chargeLog.index',compact('car_chargers','cars','chargers','user'));
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
    {  $validateData= $request->validate([
        'start' => 'required',
        'charger_id'=> 'required',
        'car_id'=>'required'
      ]);
      //Create a new charging session
      $car = \App\Car::find($request->input('car_id'));
      $charger = \App\Charger::find($request->input('charger_id'));
      $car_charger = new \App\CarCharger;
      $car_charger->user_id = \Auth::id();
      $car_charger->car_id =$request->input('car_id');
      $car_charger->charger_id=$request->input('charger_id');
      $car_charger->vehicle_battery_capacity =$car->battery_capacity;
      $car_charger->vehicle_charge_rate =$car->charge_rate;
      $car_charger->charger_charge_rate =$charger->charge_rate;
      $car_charger->flat_rate =$charger->flat_rate;
      $car_charger->fee1 =$charger->fee1;
      $car_charger->fee2 =$charger->fee2;
      $car_charger->fee_time =$charger->fee1_hr;
      $car_charger->fee1_kwh =$charger->fee1_kwh;
      $car_charger->options =$charger->options;
      $car_charger->feeoption=$charger->feeoption;
      $car_charger->start=request('start');
    //  dd(request('start'));
      $car_charger->end=request('end');
    //  dd(request('end'));
      $car_charger->save();
      $request->session()->flash('status', 'You have added a charging session!');
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
    public function edit($id, Request $request)
    {
        //
        $car = \App\Car::find($request->input('car_id'));
        $charger = \App\Charger::find($request->input('charger_id'));
        $car_chargers=\App\CarCharger::orderBy('updated_at', 'desc')->get();
        $chargers =Charger::withTrashed()->orderBy('updated_at', 'desc')->get();
        $cars =Car::withTrashed()->orderBy('updated_at', 'desc')->get();
        $car_charger=\App\CarCharger::find($id);
        $user=\Auth::user();
        return view('chargeLog.edit',compact('car_charger'));
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
        $car = \App\Car::find($request->input('car_id'));
        $charger = \App\Charger::find($request->input('charger_id'));
       $car_charger =CarCharger::find($id);
       $car_charger->vehicle_battery_capacity= $request->input('vehicle_battery_capacity');
       $car_charger->vehicle_charge_rate= $request->input('vehicle_charge_rate');
       $car_charger->charger_charge_rate= $request->input('charger_charge_rate');
       $car_charger->flat_rate = $request->input('flat_rate');
       $car_charger->fee1= $request->input('fee1');
       $car_charger->fee2= $request->input('fee2');
       $car_charger->fee_time= $request->input('fee_time');
       $car_charger->fee1_kwh= $request->input('fee1_kwh');
       $car_charger->options= $request->input('options');
       $car_charger->feeoption= $request->input('feeoption');
       $car_charger->start = $request->input('start');
      // dd($request->input('start'));
       $car_charger->end= $request->input('end');
      // dd($request->input('end'));
       $car_charger->save();

       return redirect('/chargelogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

      $referer = request()->headers->get('referer');
        $force_delete = false;
        if ("/edit" == substr($referer, -5)) {
            $force_delete = true;
        }
        // Find charging session
        $car_charger =CarCharger::find($id);
        if ($force_delete) {
        $car_charger->forceDelete();
     }
        $request->session()->flash('status', 'Catalogue deleted!');
        // redirect
        return redirect()->route('/chargelogs');

        //
    //    $car_charger =CarCharger::find($id);
      //  $car_charger->delete();
      //  $request->session()->flash('status','Charging Session '.$car_charger->id.'successfully deleted <a href=chargelogs/'.$car_charger->id.'/restore>UNDO</a>');
      //  return redirect('/chargelogs');
    }
  //  public function restore($id){
    //  $car_charger = CarCharger::withTrashed()->find($id)->restore();
      //   return redirect ('chargelogs');
  //  }
}
