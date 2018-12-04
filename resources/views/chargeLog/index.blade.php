@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between bg-secondary"><a href="/chargers" class="btn btn-primary col-md-6">Manage Charging Stations</a><a class="btn btn-primary col-md-6" href="/cars">Manage Cars</a></div>

<div class="card text-center">
<div class="card-header">

  <div>My Charge Log</div>

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
      @if (session('status'))
                <div class="alert alert-{{ session('status_class') ? session('status_class') : 'success' }}" role="alert">
                    {!! session('status') !!}
                </div>
      @endif
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
        <div class="form-group row d-flex-justify-content-center">
            <div class="col-sm-6 m-0">
                <label for="charger_id">Select a charging station</label>
                <select class="form-control" type='text'name='charger_id' id="charger_id" >
                  <option disabled selected value>Charging Station</option>
                  @foreach($user->chargers as $charger)
                  <option value="{{$charger->id}}">{{$charger->name}}</option>
                  @endforeach
                </select>
          </div>
          <div class="col-sm-6 m-0">
                <label for="car_id">Select a car station</label>
                <select class="form-control" type='text'name='car_id' id="car_id" >
                  <option disabled selected value>Car</option>
                  @foreach($user->cars as $car)
                  <option value="{{$car->id}}">{{$car->carName}}</option>
                  @endforeach
                </select>
          </div>

        </div>
         <button type="submit" class="btn btn-default mb-2">Submit</button>
      </form>
      <p class="text-center">
          <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add a charging station</a>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Add a car</button>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Add Both</button>
      </p>
      <div class='row '>
          <div class='col-sm-12 col-md-6'>
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                @include('layouts.charger_card')
              </div>
          </div>
          <div class='col-sm-12 col-md-6'>
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                @include('layouts.car_card')
              </div>
        </div>
    </div>
    <div class="card-footer text-muted text-center">
      Charge sessions added:{{count($car_chargers)}}
    </div>
  </div>

  <h2 class="text-center">Charge Sessions</h2>
  <div class="table-responsive-sm table-responsive-md table-hover">
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
      @if (count($car_chargers) == 0)
      <h2 class='text-center text-primary'>Try to Create A Charging Session!</h2>
      @endif
      @foreach ($car_chargers as $car_charger)
      @if ($car_charger->end == null)
       <h2 class='text-center text-danger'>You need to add an end time!</h2>
      @endif
       <tr is='session' date='{{$car_charger->trimDate()}}' duration='{{$car_charger->end != null ?$car_charger->duration():'You need to add a end time!'}}' chargername='{{$car_charger->charger->name}}' carname='{{$car_charger->car->carName}}' v-bind:charge_rate='{{$car_charger->charger_charge_rate <= $car_charger->vehicle_charge_rate? $car_charger->charger_charge_rate:$car_charger->vehicle_charge_rate}}' v-bind:kwhs_added='{{($car_charger->charger_charge_rate <= $car_charger->vehicle_charge_rate? $car_charger->charger_charge_rate:$car_charger->vehicle_charge_rate)*($car_charger->approximateTime())}}' url='{{url("/chargelogs",$car_charger->id)}}' v-bind:car_charger_id='{{$car_charger->id}}' v-bind:href-charge="'/chargelogs/{{$car_charger->id}}/edit'" v-bind:numhrs='{{$car_charger->approximateTime()}}' options='{{$car_charger->options}}' v-bind:flat_rate='{{$car_charger->flat_rate?$car_charger->flat_rate:'0'}}' v-bind:fee1_kwh='{{$car_charger->fee1_kwh?$car_charger->fee1_kwh:'0'}}' v-bind:fee1='{{$car_charger->fee1?$car_charger->fee1:'0'}}' v-bind:fee2='{{$car_charger->fee2?$car_charger->fee2:'0'}}' v-bind:feeoption='{{$car_charger->feeoption?$car_charger->feeoption:'0'}}' v-bind:feetime='{{$car_charger->fee_time?$car_charger->fee_time:'0'}}' v-bind:fee1_kwh='{{$car_charger->fee1_kwh?$car_charger->fee1_kwh:'0'}}' rate='{{($car_charger->options == '0'?'Kwh':($car_charger->options == '1'?'Hour':($car_charger->options == '2'?'Minute':($car_charger->options == '3'?'Session':($car_charger->options == '4'?'Changes Rates':'')))))}}' end='{{$car_charger->end == null?'bg-danger':''}}'></session>

      @endforeach
    </tbody>
    <tfoot>
      <tr>

    </tr>
    </tfoot>
</table>
</div>
</div>
@endsection
