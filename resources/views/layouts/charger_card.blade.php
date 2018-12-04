<div class="card text-center">
  <div class="card-header ">
    <div>Charging Stations</div>
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
    <h5 class="card-title">Add a charging station</h5>
    <p class="card-text">You can include public charging stations or your own charging station you have at home.</p>
    <form action="/chargers" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label class="col-sm-12"for="name">Name of charging station</label>
        <input class="form-control" type='text'name='name' id="name" >
      </div>
      <div class="form-group">
        <label for="charge_rate">Add the charger's charge rate in kilowatts(kw).</label>
        <label for="charge rate">Example:6.6</label>
        <label for="charge_rate">If the charger has its charge rate in volts/amp then multiply volts x amps to get the watts and divide by 1000.</label>
        <label for="charge rate">Example: (240v * 30amp)/1000 = 7.2 kw</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate">
      </div>

  <charging_options></charging_options>

      <button type="submit" class="btn btn-default">Submit</button>
    </div>

    </form>
  </div>
  <div class="card-footer text-muted text-center">
    Chargers added:{{count($chargers)}}
  </div>
