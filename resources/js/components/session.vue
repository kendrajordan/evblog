<template>
      <tr :class='end'>
        <th>
          <div>
              <button type='submit' class="btn"><a :href="hrefCharge"><i class="fas fa-wrench" style="font-size: 3em; color: Tomato;"></i></a></button>

        </div>
        </th>
        <td>{{date}}</td>
        <td>{{duration}}</td>
        <td>{{chargername}}</td>
        <td>{{carname}}</td>
        <td>{{rate}}</td>
        <td>{{charge_rate}}kw</td>
        <td>{{kwhs_added.toFixed(2)}}kwh</td>
        <td>{{costOptions(this.options)}}</td>
      </tr>
</template>
<script>
  export default{
  props:['date','duration','chargername','carname','charge_rate','kwhs_added','url','hrefCharge','numhrs','options','flat_rate','fee1_kwh','fee1','fee2','feeoption','feetime','rate','end'],
  data:function(){
  return{
  // token: document.head.querySelector('meta[name="csrf-token"]').content,
   hours_charging: this.numhrs,
   alert:this.end,
      }
    },
    methods:{
      costOptions:function(options){
        switch(this.options){
          case '0':
          return '$'+this.byKwh().toFixed(2);
          break;
          case '1':
          return '$'+this.byHour().toFixed(2);
          break;
          case '2':
          return '$'+this.byMinute().toFixed(2);
          break;
          case '3':
          return '$'+this.bySession().toFixed(2);
          break;
          case '4':
          return '$'+this.byFees().toFixed(2);
          break;
        }
      },
        byKwh: function(){//kwhs_added,flat_rate
           let totalcost= this.flat_rate * this.kwhs_added;
          return totalcost;
          },

        byHour: function(){//numhrs,flat_rate
           let totalcost =this.numhrs*this.flat_rate;
            return totalcost;
          },

          bySession: function(){//flat_rate
             let totalcost=this.flat_rate;
              return totalcost;
          },

          byMinute: function(){//numhrs flat_rate
      	      let totalcost=this.numhrs*60*this.flat_rate;
             return totalcost;
          },
         byFees: function(){//fee1 fee2 feetime numhrs feeoption kwhs_added fee1_kwh
         console.log('byFees');
      	let totalcost=0;
        let hours = this.hours_charging;
        let numhrsinMin= hours * 60;
        let total_kwhs = this.kwhs_added;
        let feetimelength= this.feetime;
        //if both fees are in hours
        if (this.feeoption == '1'){//Hours
          console.log('hour');

        	if(this.feetime == this.hours_charging){//if fee1 time is equal to charge time
          console.log('feetime = hours');
          	 totalcost +=(this.fee1 * feetimelength);
            return totalcost;
          }
          else if(this.feetime < this.hours_charging) {//if fee 1 time is less than charge time
            console.log('Feetime < hours');
            console.log('the fee time is '+ this.feetime);
            console.log('the feetimelength is'+feetimelength);
          	 totalcost += (this.fee1 * feetimelength);
             hours-= feetimelength;
              totalcost+= hours * this.fee2;
              return totalcost;
          }
          else if(this.feetime> this.hours_charging){//if fee 1 time is greater than charge time
          console.log('feetime greater than hours-charging');
          	 totalcost+=(hours * this.fee1);
            return totalcost;
          }
        }
        //if both fees are in minutes
       else if(this.feeoption == '2'){//by minutes
       console.log('minute');
        	if(this.feetime ==  numhrsinMin){//if fee1 time is equal to charge time

          	 totalcost =this.fee1 * feetimelength;
            	return totalcost;
          }
           else if(this.feetime < numhrsinMin) {//if fee 1 time is less than charge time
          		 totalcost += this.fee1 * feetimelength;
              numhrsinMin-= feetimelength;
              console.log(numhrsinMin);
              totalcost+= numhrsinMin * this.fee2;
              return totalcost;
          }
           else if(this.feetime > numhrsinMin){//if fee 1 time is greater than charge time
           console.log(numhrsinMin);
          	 totalcost+= numhrsinMin * this.fee1;
             console.log(totalcost);
            return totalcost;
          }
        }
        //if both fees are in kwh
   else  if (this.feeoption == '3'){//Kwh
        console.log('kwh');
       if(this.fee1_kwh == this.kwhs_added){//if the first fee in kwh equal to total kwh added
           totalcost= total_kwhs*this.fee1;
          return totalcost;
         }
       	else if(this.fee1_kwh < this.kwhs_added){//if fee 1 in kwh is less than total kwh added
          	 totalcost+=(this.fee1*this.fee1_kwh);
            total_kwhs -= this.fee1_kwh;
            totalcost+=(total_kwhs*this.fee2);
            return totalcost;
          }
        else if(this.fee1_kwh > this.kwhs_added){//if the total kwh added was less than the first fee in kwh
            totalcost= total_kwhs*this.fee1;
        return totalcost;
        }
      }
    }
  }
}
</script>
