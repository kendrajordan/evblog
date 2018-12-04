@extends('layouts.app')

@section('content')
<div class="text-center">
<h1>Vehicle Charging History</h1>
<h2>{{$car->carName}}</h2>
</div>
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
        @if (count($car->car_charger) == 0)
        <h2 class='text-center text-primary'>This car has not been to any charging stations.</h2>
        @endif
        @foreach ($car->car_charger as $car_charger)
        @if ($car_charger->end == null)
         <h2 class='text-center text-danger'>You need to add an end time!</h2>
        @endif
         <tr is='session' date='{{$car_charger->trimDate()}}' duration='{{$car_charger->end != null ?$car_charger->duration():'You need to add a end time!'}}' chargername='{{$car_charger->charger->name}}' carname='{{$car_charger->car->carName}}' v-bind:charge_rate='{{$car_charger->charger_charge_rate <= $car_charger->vehicle_charge_rate? $car_charger->charger_charge_rate:$car_charger->vehicle_charge_rate}}' v-bind:kwhs_added='{{($car_charger->charger_charge_rate <= $car_charger->vehicle_charge_rate? $car_charger->charger_charge_rate:$car_charger->vehicle_charge_rate)*($car_charger->approximateTime())}}' url='{{url("/chargelogs",$car_charger->id)}}' v-bind:car_charger_id='{{$car_charger->id}}' v-bind:href-charge="'/chargelogs/{{$car_charger->id}}/edit'" v-bind:numhrs='{{$car_charger->approximateTime()}}' options='{{$car_charger->options}}' v-bind:flat_rate='{{$car_charger->flat_rate?$car_charger->flat_rate:'0'}}' v-bind:fee1_kwh='{{$car_charger->fee1_kwh?$car_charger->fee1_kwh:'0'}}' v-bind:fee1='{{$car_charger->fee1?$car_charger->fee1:'0'}}' v-bind:fee2='{{$car_charger->fee2?$car_charger->fee2:'0'}}' v-bind:feeoption='{{$car_charger->feeoption?$car_charger->feeoption:'0'}}' v-bind:feetime='{{$car_charger->fee_time?$car_charger->fee_time:'0'}}' v-bind:fee1_kwh='{{$car_charger->fee1_kwh?$car_charger->fee1_kwh:'0'}}' rate='{{($car_charger->options == '0'?'Kwh':($car_charger->options == '1'?'Hour':($car_charger->options == '2'?'Minute':($car_charger->options == '3'?'Session':($car_charger->options == '4'?'Changes Rates':'')))))}}' end='{{$car_charger->end == null?'bg-danger':''}}'></session>

        @endforeach
        
      </tbody>
    </table>
</div>
@endsection
