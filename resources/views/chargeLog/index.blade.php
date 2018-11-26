@extends('layouts.app')

@section('content')
<div class="card text-center">
<div class="card-header">
  My Charge Log
</div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <h5 class="card-title">Create a charging session</h5>
      <p class="card-text">Select from the lists of charging stations and cars to create a charging session.
        If the charging station or car is not listed then please create one in the forms below or click the
      'My Cars' or 'Visited Charging Stations links to manage them.'</p>
      <form action="/chargelogs" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-sm-6">
              <label for="start">Start time of the charging session</label>
              <input class="form-control" type='datetime-local'name='start' id="start" >
            </div>
            <div class="form-group col-sm-6">
              <label for="end">End time of charging session</label>
              <input class="form-control" type='datetime-local'name='end' id="end" >
            </div>
      </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="charger_id">Select a charging station</label>
                <select class="form-control" type='text'name='charger_id' id="charger_id" >
                  <option disabled selected value>Charging Station</option>
                  @foreach(Auth::user()->chargers as $charger)
                  <option value="{{$charger->id}}">{{$charger->name}}</option>
                  @endforeach
                </select>
          </div>
          <div class="col-sm-6">
                <label for="car_id">Select a car station</label>
                <select class="form-control" type='text'name='car_id' id="car_id" >
                  <option disabled selected value>Car</option>
                  @foreach(Auth::user()->cars as $car)
                  <option value="{{$car->id}}">{{$car->carName}}</option>
                  @endforeach
                </select>
          </div>
        </div>
         <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <p class="text-center">
          <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add a charging station</a>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Add a car</button>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Add Both</button>
      </p>
      <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div>
                @include('layouts.charger_card')
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div>
                @include('layouts.car_card')
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer text-muted">
      Charge sessions added:{{count($car_chargers)}}
    </div>
</div>
<div>
  <h2 class="text-center">Charge Sessions</h2>
<table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Duration</th>
      <th>Charge Rate</th>
      <th>Kwhs Added</th>
      <th>Cost</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th>
      </th>
    </tr>

  </tbody>
</table>
</div>
@endsection
