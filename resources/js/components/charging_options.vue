<template>
<div class="form-group row d-flex justify-content-center ">
  <label for="options" class="col-sm-12">Please click on the pay option your charging station accepts.</label>
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-secondary active">
      <input type="radio" name="options" id="per_kwh" autocomplete="off" checked value='0'>Per Kwh
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="options" id="per_hour" autocomplete="off" value='1'> Per Hour
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="options" id="per_minute" autocomplete="off" value='2'> Per Minute
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="options" id="per_session" autocomplete="off" value='3'> Per Session
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="options" id="fees" autocomplete="off" value='4'> Changing Rates
    </label>
  </div>
</div>
</template>
<script>
</script>
