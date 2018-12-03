@extends('layouts.app')

@section('content')
<div class="card text-center">
  <div class="card-header">
    My Cars
  </div>
<div class="card-body">
  <h5 class="card-title">Edit your car infromation here.</h5>
    <form action="/cars/{{$car->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="carname">Edit the name of your vehicle</label>
        <input class="form-control" type='text'name='carName' id="carname" value="{{$car->carName}}">
      </div>
      <div class="form-group">
        <label for="battery_capacity">Edit the vehicle's battery capacity</label>
        <input class="form-control" type='text'name='battery_capacity' id="battery_capacity" value="{{$car->battery_capacity}}">
      </div>
      <div class="form-group">
        <label for="charge_rate">Edit the vehicle's accepted rate of charge</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate" value="{{$car->charge_rate}}">
      </div>
       <button type="submit" class="btn btn-default">Submit</button>
       <a href="/cars" type="button" class="btn">Cancel</a>
    </form>
  </div>
</div>
@endsection
