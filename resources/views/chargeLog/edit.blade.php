@extends('layouts.app')

@section('content')
<div>
  <div class='text-center'>
    <h1>Edit your charging session</h5>
    <p>Select from the lists of charging stations and cars to edit a charging session.</p>
  </div>
    <form action="/chargelogs/{{$car_charger->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="text-center row d-flex justify-content-around">
          <div class="form-group">
            <label for="start">Start time of the charging session</label>
            <input class="form-control" type='datetime-local'name='start' id="start" value="{{$car_charger->time()}}" >
          </div>
          <div class="form-group">
            <label for="end">End time of charging session</label>
            <input class="form-control" type='datetime-local'name='end' id="end" value="{{$car_charger->end != null?$car_charger->timeEnd():''}}" >
          </div>
    </div>

      <div class='text-center'>
        <h2>Edit Charging Station Information</h2>
        <p>You can include public charging stations or your own charging station you have at home.</p>
          <div class="form-group">
            <h3>{{$car_charger->charger->name}}</h3>
          </div>
          <div class="form-group">
            <label for="charger_charge_rate">Edit the charger's charge rate in kilowatts(kw).</label>
            <label for="charger_charge_rate">Example:6.6</label>
            <label for="charger_charge_rate">If the charger has its charge rate in volts/amp then multiply volts x amps to get the watts and divide by 1000.</label>
            <label for="charger_charge_rate">Example: (240v * 30amp)/1000 = 7.2 kw</label>
            <input class="form-control" type='text'name='charger_charge_rate' id="charger_charge_rate" value="{{$car_charger->charger_charge_rate}}">
          </div>

          <charging_options_edit :options='{{$car_charger->options}}' :feeoption='{{$car_charger->feeoption?$car_charger->feeoption:'null'}}' :flat_rate='{{$car_charger->flat_rate?$car_charger->flat_rate:'null'}}' :initial='{{$car_charger->fee1?$car_charger->fee1:'null'}}' :secondary='{{$car_charger->fee2?$car_charger->fee2:'null'}}' :feetime='{{$car_charger->fee_time?$car_charger->fee_time:'null'}}' :kwh_fee='{{$car_charger->fee1_kwh?$car_charger->fee1_kwh:'null'}}'></charging_options_edit>
      </div>
      <div class="text-center">
        <h2>Edit your car information here.</h2>
            <h3>{{$car_charger->car->carName}}</h3>
            <div class="form-group">
              <label for="battery_capacity">Edit the vehicle's battery capacity</label>
              <input class="form-control" type='text'name='vehicle_battery_capacity' id="battery_capacity" value="{{$car_charger->vehicle_battery_capacity}}">
            </div>
            <div class="form-group">
              <label for="charge_rate">Edit the vehicle's accepted rate of charge</label>
              <input class="form-control" type='text'name='vehicle_charge_rate' id="vehicle_charge_rate" value="{{$car_charger->vehicle_charge_rate}}">
            </div>
      </div>
       <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
