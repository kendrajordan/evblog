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
                  @foreach($user->chargers as $charger)
                  <option value="{{$charger->id}}">{{$charger->name}}</option>
                  @endforeach
                </select>
          </div>
          <div class="col-sm-6">
                <label for="car_id">Select a car station</label>
                <select class="form-control" type='text'name='car_id' id="car_id" >
                  <option disabled selected value>Car</option>
                  @foreach($user->cars as $car)
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

    <div class="card-footer text-muted text-center">
      Charge sessions added:{{count($car_chargers)}}
    </div>
  </div>

  <h2 class="text-center">Charge Sessions</h2>
  <div class="table-responsive-sm table-responsive-md ">
  <table class="table">
    <thead>
      <tr>
        <th>Edit/Delete</th>
        <th>Date</th>
        <th>Duration</th>
        <th>Charging Station</th>
        <th>Vehicle</th>
        <th>Charging by the:</th>
        <th>Charge Rate</th>
        <th>Kwhs Added</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($car_chargers as $car_charger)
       <tr is='session' date='{{$car_charger->trimDate()}}' duration='{{$car_charger->duration()}}' chargername='{{$car_charger->charger->name}}' carname='{{$car_charger->car->carName}}' v-bind:charge_rate='{{$car_charger->charger->charge_rate <= $car_charger->car->charge_rate? $car_charger->charger->charge_rate:$car_charger->car->charge_rate}}' v-bind:kwhs_added='{{($car_charger->charger->charge_rate <= $car_charger->car->charge_rate? $car_charger->charger->charge_rate:$car_charger->car->charge_rate)*($car_charger->approximateTime())}}' url='{{url("/chargelogs",$car_charger->id)}}' v-bind:car_charger_id='{{$car_charger->id}}' v-bind:href-charge="'/chargelogs/{{$car_charger->id}}/edit'" v-bind:numhrs='{{$car_charger->approximateTime()}}' options='{{$car_charger->charger->options}}' v-bind:flat_rate='{{$car_charger->charger->flat_rate?$car_charger->charger->flat_rate:'0'}}' v-bind:fee1_kwh='{{$car_charger->charger->fee1_kwh?$car_charger->charger->fee1_kwh:'0'}}' v-bind:fee1='{{$car_charger->charger->fee1?$car_charger->charger->fee1:'0'}}'
         v-bind:fee2='{{$car_charger->charger->fee2?$car_charger->charger->fee2:'0'}}' v-bind:feeoption='{{$car_charger->charger->feeoption?$car_charger->charger->feeoption:'0'}}' v-bind:feetime='{{$car_charger->charger->fee1_hr?$car_charger->charger->fee1_hr:'0'}}' v-bind:fee1_kwh='{{$car_charger->charger->fee1_kwh?$car_charger->charger->fee1_kwh:'0'}}' rate='{{($car_charger->charger->options == '0'?'Kwh':($car_charger->charger->options == '1'?'Hour':($car_charger->charger->options == '2'?'Minute':($car_charger->charger->options == '3'?'Session':($car_charger->charger->options == '4'?'Changes Rates':'')))))}}'></session>
        <!--<tr is='session'
           v-bind:fee1='{{$car_charger->charger->fee1}}' v-bind:fee2='{{$car_charger->charger->fee2}}' v-bind:feeoption='{{$car_charger->charger->feeoption}}' v-bind:feetime='{{$car_charger->charger->fee1_hr}}' v-bind:fee1_kwh='{{$car_charger->charger->fee1_kwh}}' totalcost='0'></session>-->
      @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
