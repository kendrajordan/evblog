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
      <div class="form-group row d-flex justify-content-center ">
        <label for="options" class="col-sm-12">Change the pay option your charging station accepts.</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary {{$chargers->options == '0'? 'active':''}}">
            <input type="radio" name="options" id="per_kwh" autocomplete="off" checked value='0'>Per Kwh
          </label>
          <label class="btn btn-secondary {{$chargers->options == '1'? 'active':''}}">
            <input type="radio" name="options" id="per_hour" autocomplete="off" value='1'> Per Hour
          </label>
          <label class="btn btn-secondary {{$chargers->options == '2'? 'active':''}}">
            <input type="radio" name="options" id="per_minute" autocomplete="off" value='2'> Per Minute
          </label>
          <label class="btn btn-secondary {{$chargers->options == '3'? 'active':''}}">
            <input type="radio" name="options" id="per_session" autocomplete="off" value='3'> Per Session
          </label>
          <label class="btn btn-secondary {{$chargers->options == '4'? 'active':''}}">
            <input type="radio" name="options" id="fees" autocomplete="off" value='4'> Changing Rates
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="flat_rate">Edit Flat Rate Price</label>
        <input class="form-control" type='text'name='flat_rate' id="flat_rate" value="{{$chargers->flat_rate}}">
      </div>
      <div id="changing_fees">
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="fee1">Edit Initial Fee</label>
          <input class="form-control" type='text'name='fee1' id="fee1" value="{{$chargers->fee1}}">
        </div>
        <div class="form-group col-sm-6">
          <label for="fee2" class="col-sm-12">Edit Changed Fee</label>
          <input class="form-control" type='text'name='fee2' id="fee2" value="{{$chargers->fee2}}">
        </div>
        </div>
      </div>
      <div class='row'>
        <div class="form-group col-sm-12">
          <label for="feeoption"class="col-sm-12">Please change the rate.</label>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary {{$chargers->feeoption == '1'? 'active':''}}">
              <input type="radio" name="feeoption" id="fee1_per_hour" autocomplete="off" value='1'>Per Hour
            </label>
            <label class="btn btn-secondary {{$chargers->feeoption == '2'? 'active':''}}">
              <input type="radio" name="feeoption" id="fee1_per_minute" autocomplete="off" value='2'> Per Minute
            </label>
            <label class="btn btn-secondary {{$chargers->feeoption == '3'? 'active':''}}">
              <input type="radio" name="feeoption" id="fee1_per_kwh" autocomplete="off" value='3'> Per Kwh
            </label>
          </div>
        </div>
    </div>
      <div class="row">
        <div class="form-group col">
          <label for="fee1_hr">For how many minutes or hours will the intial fee be in affect?</label>
          <input class="form-control" type='text'name='fee1_hr' id="fee1_hr" value="{{$chargers->fee1_hr}}">
        </div>
      </div>
      <div id="kwh_fee">
        <div class="form-group col ">
          <label for="fee1_kwh">For how many kilowatts will the initial fee be in affect?</label>
          <input class="form-control" type='text'name='fee1_kwh' id="fee1_kwh" value="{{$chargers->fee1_kwh}}">
        </div>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
      <a href="/chargers" class="btn btn-dark">Cancel</a>
    </div>

    </form>
  </div>
  <div class="card-footer text-muted text-center">
    Chargers added:{{count($chargers)}}
  </div>
</div>
@endsection
