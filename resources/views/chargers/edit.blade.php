@extends('layouts.app')

@section('content')
<div class="card text-center">
  <div class="card-header">
    Chargers Visited
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
    <h5 class="card-title">Edit Charging Station Information</h5>
    <p class="card-text">You can include public charging stations or your own charging station you have at home.</p>
    <form action="/chargers/{{$chargers->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group row">
        <label class="col-sm-12"for="name">Edit the name of the charging station</label>
        <input class="form-control" type='text'name='name' id="name" value="{{$chargers->name}}" >
      </div>
      <div class="form-group">
        <label for="charge_rate">Edit the charger's charge rate in kilowatts(kw).</label>
        <label for="charge rate">Example:6.6</label>
        <label for="charge_rate">If the charger has its charge rate in volts/amp then multiply volts x amps to get the watts and divide by 1000.</label>
        <label for="charge rate">Example: (240v * 30amp)/1000 = 7.2 kw</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate" value="{{$chargers->charge_rate}}">
      </div>

      <charging_options_edit :options='{{$chargers->options}}' :feeoption='{{$chargers->feeoption?$chargers->feeoption:'null'}}' :flat_rate='{{$chargers->flat_rate?$chargers->flat_rate:'null'}}' :initial='{{$chargers->fee1?$chargers->fee1:'null'}}' :secondary='{{$chargers->fee2?$chargers->fee2:'null'}}' :feetime='{{$chargers->fee1_hr?$chargers->fee1_hr:'null'}}' :kwh_fee='{{$chargers->fee1_kwh?$chargers->fee1_kwh:'null'}}'></charging_options_edit>
  
      <button type="submit" class="btn btn-default">Submit</button>
      <a href="/chargers" class="btn btn-dark">Cancel</a>
    </div>

    </form>
  </div>

</div>
@endsection
