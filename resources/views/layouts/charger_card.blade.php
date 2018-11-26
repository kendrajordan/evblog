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
    <h5 class="card-title">Add a charging station</h5>
    <p class="card-text">You can include public charging stations or your own charging station you have at home.</p>
    <form action="/chargers" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label for="name">Name of charging station</label>
        <input class="form-control" type='text'name='name' id="name" >
      </div>
      <div class="form-group">
        <label for="per_kwh">Click if the price is per kwh or per hour</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary active">
            <input type="radio" name="per_kwh" id="per_kwh" autocomplete="off" checked value='1'>Per Kwh
          </label>
          <label class="btn btn-secondary">
            <input type="radio" name="per_kwh" id="per_hour" autocomplete="off" value='0'> Per Hour
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="cost">Add the price for using the charging station</label>
        <input class="form-control" type='text'name='cost' id="cost">
      </div>
      <div class="form-group">
        <label for="charge_rate">Add the charger's charge rate</label>
        <input class="form-control" type='text'name='charge_rate' id="charge_rate">
      </div>
       <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="card-footer text-muted">
    Chargers added:{{count($chargers)}}
  </div>
</div>
