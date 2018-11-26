<div class="card text-center">
  <div class="card-header">
    My Cars
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
    <h5 class="card-title">Add your electric car.</h5>
    <p class="card-text">You can add up to 8 vehicles at a time.</p>
    <form action="/cars" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label for="carname">Name your vehicle</label>
        <input class="form-control" type='text'name='carName' id="carname" >
      </div>
      <div class="form-group">
        <label for="battery_capacity">Add the vehicle's battery capacity</label>
        <input class="form-control" type='text'name='battery_capacity' id="battery_capacity" >
      </div>
      <div class="form-group">
        <label for="charge_rate">Add the vehicle's accepted rate of charge</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate" >
      </div>
       <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="card-footer text-muted">
    Cars added:{{count($cars)}}
  </div>
</div>
