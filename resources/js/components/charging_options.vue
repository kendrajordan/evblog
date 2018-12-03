<template>
<div style="width:100%">
  <div class="form-group  justify-content-center ">
    <label for="options" class="col-sm-12">Please click on the pay option your charging station accepts.</label>
    <div class="btn-group btn-group-toggle row d-flex justify-content-center" >
      <label class="btn btn-secondary mb-1 " :class="rateType == '0'?'active':''" >
        <input type="radio" name="options" id="per_kwh" autocomplete="off" v-model="rateType" value='0'>Per Kwh
      </label>
      <label class="btn btn-secondary mb-1 " :class="rateType == '1'?'active':''">
        <input type="radio" name="options" id="per_hour" autocomplete="off" value='1'  v-model="rateType"> Per Hour
      </label>
      <label class="btn btn-secondary mb-1 " :class="rateType == '2'?'active':''">
        <input type="radio" name="options" id="per_minute" autocomplete="off" value='2'  v-model="rateType" > Per Minute
      </label>
      <label class="btn btn-secondary mb-1 " :class="rateType == '3'?'active':''">
        <input type="radio" name="options" id="per_session" autocomplete="off" value='3'  v-model="rateType" > Per Session
      </label>
      <label class="btn btn-secondary mb-1  " :class="rateType == '4'?'active':''">
        <input type="radio" name="options" id="fees" autocomplete="off"  value='4' v-model="rateType"> Changing Rates
      </label>
    </div>
  </div>
  <div class="form-group" id='flat_fee' v-if="rateType < '4' ">
      <label for="flat_rate">Add Flat Rate Price</label>
      <input class="form-control" type='text' name='flat_rate' id="flat_rate" key='flat_rate-input'>
    </div>

    <div id="changing_fees" v-else>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="fee1">Add Initial Fee</label>
                  <input class="form-control" type='text'name='fee1' id="fee1" key='fee1-input'>
              </div>
            <div class="form-group col-sm-6">
              <label for="fee2" class="col-sm-12">Add Changed Fee</label>
              <input class="form-control" type='text'name='fee2' id="fee2" key='fee2-input'>
            </div>
          </div>
    <div class='row'>
        <div class="form-group col-sm-12">
          <label for="feeoption"class="col-sm-12">Please click on the rate for your initial fee.</label>
          <div class="btn-group btn-group-toggle">
            <label class="btn btn-secondary" :class="combo == '1'?'active':''">
              <input type="radio" name="feeoption" id="fee1_per_hour" autocomplete="off" value='1' v-model="combo">Per Hour
            </label>
            <label class="btn btn-secondary" :class="combo == '2'?'active':''">
              <input type="radio" name="feeoption" id="fee1_per_minute" autocomplete="off" value='2' v-model="combo"> Per Minute
            </label>
            <label class="btn btn-secondary" :class="combo == '3'?'active':''">
              <input type="radio" name="feeoption" id="fee1_per_kwh"  value='3' v-model="combo"> Per Kwh
            </label>
          </div>
        </div>
      </div>

  <div class="row" v-if="combo < 3" >
    <div class="form-group col" >
      <label for="fee1_hr">For how many minutes or hours will the intial fee be in affect?</label>
      <input class="form-control" type='text'name='fee1_hr' id="fee1_hr">
    </div>
  </div>
  <div id="kwh_fee" v-else>
    <div class="form-group col ">
      <label for="fee1_kwh">For how many kilowatts will the initial fee be in affect?</label>
      <input class="form-control" type='text'name='fee1_kwh' id="fee1_kwh">
    </div>
  </div>
  </div>
  </div>
</template>
<script>
export default {
    props : [],
    data:function(){
      return{
      rateType:'0',
      combo:'1',
      }
    },
    methods:{

    }

  }
</script>
