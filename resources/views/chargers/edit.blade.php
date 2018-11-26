@extends('layouts.app')

@section('content')
<div class="card text-center">
  <div class="card-header">
    Chargers Visited
  </div>
<div class="card-body">
  <h5 class="card-title">Edit charging station information</h5>
    <form action="/chargers/{{$charger->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name">Edit the name of the charger</label>
        <input class="form-control" type='text'name='name' id="name" value="{{$charger->name}}">
      </div>
      <div class="form-group">
        <label for="per_kwh">Click if the price is per kwh or per hour</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary {{$charger->per_kwh ?'active' : ''}}">
            <input type="radio" name="per_kwh" id="per_kwh" autocomplete="off" value='1'>Per Kwh
          </label>
          <label class="btn btn-secondary {{!$charger->per_kwh ?'active' : ''}}">
            <input type="radio" name="per_kwh" id="per_hour" autocomplete="off" value='0'> Per Hour
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="cost">Edit the price for using the charging station</label>
        <input class="form-control" type='text'name='cost' id="cost" value="{{$charger->cost}}">
      </div>
      <div class="form-group">
        <label for="charge_rate">Edit the charging station's charge rate</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate" value="{{$charger->charge_rate}}">
      </div>
       <button type="submit" class="btn btn-default">Submit</button>
       <a href="/chargers" type="button" class="btn">Cancel</a>
    </form>
  </div>
</div>
@endsection
