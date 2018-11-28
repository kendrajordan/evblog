<template>
      <tr>
        <th>
          <div class="row">
              <button type='submit' class="btn btn-dark"><a :href="hrefCharge"><i class="fas fa-user-edit text-primary"></i></a></button>
              <form :action="url" method='POST'>
                        <input type='hidden' name='_token' :value='token'/>
                          <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"class="btn btn-dark"><i class="fas fa-user-minus text-primary"></i></button>

              </form>
        </div>
        </th>
        <td>{{date}}</td>
        <td>{{duration}}</td>
        <td>{{chargername}}</td>
        <td>{{carname}}</td>
        <td>{{charge_rate}}</td>
        <td>{{kwhs_added}}</td>
        <td>${{costToCharge(option)}}</td>
      </tr>
</template>
<script>
  export default{
  props:['date','duration','chargername','carname','charge_rate','kwhs_added','car_chargers','car_charger','url','hrefCharge','numhrs','option','price',],
  data:function(){
  return{
   token: document.head.querySelector('meta[name="csrf-token"]').content
      }
    },
    methods:{
      costToCharge:function(option){
        if(this.option == '1'){
          let cost = this.kwhs_added * this.price;
          return cost.toFixed(2);
        }
        else{
        let cost = this.numhrs * this.price;
        return cost.toFixed(2);
        }
      },
      costOptions:function(option){
        switch(this.option){
          case '0':
          byKwh(kwhs_added,flat);
          break;
          case '1':
          byHour(numhrs,flat);
          break;
          case '2':
          bySession(flat);
          break;
          case '3':
          byMinute(numhrs,flat);
          break;
          case '4':
          byFees(fee1,fee2,fee1Time,numhrs,fee1option,fee2option);
          break;
        }
      },
    }
  }

</script>
