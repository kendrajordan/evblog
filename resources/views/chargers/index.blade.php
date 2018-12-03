@extends('layouts.app')
@section('content')
@include('layouts.charger_card')
<div class ='container'>
  <h1 class='text-center'>Chargers Used</h1>
  @foreach ($chargers as $charger)
  <div class="card mt-3 mb-3">
    <div class="card-body">
      <h5 class="card-title">{{$charger->name}}</h5>
      <p class="card-text">Charges by the: {{($charger->options == '0'?'Kwh':($charger->options == '1'?'Hour':($charger->options == '2'?'Minute':($charger->options == '3'?'Session':($charger->options == '4'?'Changes Rates':'')))))}}</p>
      <p class="card-text">Flat rate: $ {{$charger->flat_rate != NULL ? $charger->flat_rate :'Charger doesn\'t have a flat rate' }}</p>
      <p class="card-text">Charge Rate: {{$charger->charge_rate}} KW</p>
      <p class="card-text">Fees: The initial fee is ${{$charger->fee1 !=NULL? $charger->fee1:'not available'}} and the secondary fee is ${{$charger->fee1 !=NULL? $charger->fee2:' not available'}} for this charger.</p>
      <p class="card-text">Changing rate:{{$charger->feeoption == '1'?'The fee changes over a hourly rate':($charger->feeoption == '2'?'The fee changes over a minute rate.':($charger->feeoption == '3'?'The fee changes over a kilowatt rate.':'The fee does not change on any rate.'))}}</p>
      <p class="card-text">Time interval for the initial fee:{{$charger->fee1_hr != NULL? round($charger->fee1_hr,2):''}} {{$charger->feeoption == '1'?'hours':($charger->feeoption == '2'?'minutes':'none')}}.</p>
      <p class="card-text">Kwh Limit for the initial fee:{{$charger->fee1_kwh?$charger->fee1_kwh.'KW':'none.'}}</p>
    </div>
    <div class="card-footer bg-dark">
      <small class="text-muted">Posted by {{$charger->user->name}} on {{$charger->updated_at}}.</small>
        <div class="float-right row">
            <button type='submit' class="btn btn-dark"><a href="/chargers/{{$charger->id}}/edit"><i class="fas fa-user-edit text-primary"></i></a></button>
            <form action="{{url('/chargers',$charger->id)}}" method='POST'>
                        @csrf
                        {{ method_field('DELETE') }}
                      <button type="submit"class="btn btn-dark"><i class="fas fa-user-minus text-primary"></i></button>

            </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
