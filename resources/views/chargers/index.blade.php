@extends('layouts.app')
@section('content')
@include('layouts.charger_card')
<div class ='container'>
  <h1 class='text-center'>Chargers Used</h1>
  @foreach ($chargers as $charger)
  <div class="card mt-3 mb-3">
    <div class="card-body">
      <h5 class="card-title">{{$charger->name}}</h5>
      <p>Charges by the: {{$charger->per_kwh?'Kwh':'Hour'}}</p>
      <p class="card-text">Cost: ${{$charger->cost}}</p>
      <p class="card-text">Charge Rate: {{$charger->charge_rate}} KW</p>
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
