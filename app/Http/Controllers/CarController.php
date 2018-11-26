<?php

namespace App\Http\Controllers;

use App\User;
use App\Car;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars =Car::orderBy('updated_at', 'desc')->get();
        return view('cars.index',compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "Provide a form to add a car";
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
          'carName' => 'required|unique:cars|max:255',
          'battery_capacity'=>'required',
          'charge_rate'=>'required'
        ]);
        $car = new Car();
        $car->carName = request('carName');
        $car->battery_capacity = request('battery_capacity');
        $car->charge_rate = request('charge_rate');
        $car->user_id = \Auth::id();
        $car->save();
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
        $car=\App\Car::find($id);
        return view('cars.edit',compact('car'));
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
        $car =Car::find($id);
        $car->carName  = $request->input('carName');
        $car->battery_capacity = $request->input('battery_capacity');
        $car->user_id = \Auth::id();
        $car->charge_rate = $request->input('charge_rate');
        $car->save();
        return redirect('/cars');
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
