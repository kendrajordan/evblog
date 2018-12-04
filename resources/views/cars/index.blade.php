@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between bg-secondary"><a href="/chargelogs" class="btn btn-primary col-md-6">Manage Charge Sessions</a><a class="btn btn-primary col-md-6" href="/chargers">Manage Charging Stations</a></div>

@include('layouts.car_card')
<div class ='container'>
  <h1 class='text-center'>My Car Selection</h1>
  @if (session('status'))
            <div class="alert alert-{{ session('status_class') ? session('status_class') : 'success' }}" role="alert">
                {!! session('status') !!}
            </div>
  @endif
  @foreach ($cars as $car)
  <div class="card mt-3 mb-3">
    <div class="card-body">
      <a href="/cars/{{$car->id}}"><h5 class="card-title">{{$car->carName}}</h5></a>
      <p class="card-text">Battery Capacity:{{$car->battery_capacity}}</p>
      <p class="card-text">Charge Rate:{{$car->charge_rate}}</p>
    </div>
    <div class="card-footer bg-dark">
      <small class="text-muted">Posted by {{$car->user->name}} on {{$car->updated_at}}.</small>
        <div class="float-right row">
            <button type='submit' class="btn btn-dark"><a href="/cars/{{$car->id}}/edit"><i class="fas fa-user-edit text-primary"></i></a></button>
            <form action="{{url('/cars',$car->id)}}" method='POST'>
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
