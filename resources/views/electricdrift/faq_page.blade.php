@extends('layout')
@section('content')
      <div class="jumbotron jumbotron-fluid mb-0 faq ">
        <div class="container faqtext">
          <h1 class="display-4">F.A.Qs</h1>
          <p class="lead">All your questions about electric cars answered.</p>
        </div>
      </div>
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What is an Electric Cars?
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              An electric car is a plug-in vehicle that doesn't contain a combustion engine and its sole fuel source is electricity.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How do I charge the car and for how long?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <p>The length of time it takes to charge an electric vehicle depends on two factors. First, where you are plugging in the vehicle and second,
              how much of an electirc load the car can take during a charging session.<p>
              <p>There are three levels of charging an electric car and these are 110 volts ( level 1 ),
              240 volts ( level 2 ) and anything above level 2 charging is considered to be level 3.</p>
              <p>Level 1 ( 110 volts ) is the voltage used to power regular household appliances such as a light bulb or a toaster. You can plug-in the vehicle into to a regular
                house outlet using specialized electic vehicle charging equipment included with your purchace of an electric vehicle. At the rate of 110 v an electric vehicle can add 4 - 5 miles in an hour.
              It is not common practice to charge an electtric vehicle through level 1 charging. This method of charging is usually used by people who have initially purchased their first electric car or by someone
            who needs to charge their car due to an emergancy.</p>
              <p>Level 2 ( 240 volts ) is the voltage used to power more energy demanding appliances such as the washer or dryer units. You would need to either have a home charging station installed at your home,
                or purchase one that can be plugged in to an electric socket that can accept an amprage of at least 30 amps. There are also public charging stations that you can find if you would like to refuel on the go.
                 At the rate of 240 v an electric vehicle can add 15 - 25 miles in at hour.
              This is the most common way to charge an electric vehicle. Ev owners usually plug-in their cars and let them charge over night when the energy demand is the lowest and by the time they are ready to leave for the next day, they have a fully charged car.
            </p>
              <p>Level 3, also know as DC ( Direct Current ) fast charging, is the fastest method of charging an electric vehicle. At level 3, an electric vehicle can add 50 to 90 miles of range in just 30 minutes.
              These charging stations are only available for commercial use.</p>
              <p>The estimate ranges provided also depends the the energy load an electric car can take during a charging session. The bigger the load it can take, the faster the car will be able to charge.</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How far can you go on one charge?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              <p> So far there are three types of electric cars. The long range electric vehicle such as the Cheverolt Bolt EV, Tesla Model S and others can go over 200 miles per charge.
               The middle range vehicles usually have a range around 150 miles such as the 2018 Nissan leaf. Finally, there are the short range electic vehicles with ranges between 75 to 107 miles per charge. </p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                How much does it cost to fuel up an Electric Car?
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
              <p>This depends on where you live, where you are fueling your car, how often you drive and the mpge or "miles per gallon equivalent" of the electricity vehicle. The price for electric greatly differs from
                state to state. However, for this example let's use the national average of 12 cents per kwh to demonstrate how much it would cost to fuel an electric car from home. The next thing that we will need to know
                is the mpge of the car. The mpge of an electric vehicle is based on the measurement of 1 gallon of gas is the equivalent of 33.7 kwh of electric.You can go to fuel comparisons page on this site or go to fueleconomy.gov to find
                the mpge of any electric or plug-in hybrid vehicle.  For the example let's also use the 2015 Nissan Leaf's mpge of 114 mi. Finally, we need to know how many miles you've driven.
                For the example let's say you have driven the range of the vehicle of 84 miles. We will use this information to first calculate the number of kwh used and then multiply by 12 cents to calculate the cost.</p>
            <p class="text-center">  ( kwh used / miles driven ) = ( 33.7 kwh / 114 mi ) </p>
            <p class="text-center"> ( kwh used / 84 mi ) = ( 33.7 kwh / 114 mi )</p>
            <p class="text-center"> kwh used = 24.83</p>
            <p class="text-center"> 24.83 kwh used * 12 cents = $2.98</p>


            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFive">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                How Long Does An Electric Car's Battery Last?
              </button>
            </h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
              Lithium-ion battery packs in electric cars usually last 10 years or more. After the battery packs become unusable for driving purposes
              then the battery pack can be recycled or reused for home energy storage.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingSix">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              What is a PHEV?
              </button>
            </h5>
          </div>
          <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
              A PHEV is a hybrid vehicle that has a battery that can be charged independently to help supplement the power of its combustion
              engine. When the battery is almost depleted, then the combustion engine kicks in so that the driver can continue driving the vehicle.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingSeven">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                How much maintance does an electric car need?
              </button>
            </h5>
          </div>
          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">
<p>Compared to a traditional combustion engine car, the maintance for an electric car is relatively low. There are no oil changes, spark plug replacements, emission checks or need to change fuel filters.
This is due to electric vehicles not posessing a combustion engine. With an electric vehicle, you will still need to pay for tire rotations,windshield wipers and to some extent brakes. As for changing an electric vehicle's brakes, due to them
having regenerative braking, the brakes will last longer and won't need to be replaced as often.</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingEight">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                How much does it cost to buy a charging station for the home?
              </button>
            </h5>
          </div>
          <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
            <div class="card-body">
              <p>For a level 1 charge, it comes free with purchase of an electric vehicle. For a level 2 charging station the cost can range from $400 to $800 if you install a charging station at home.
              As for a level 3 charging station, the cost for one can be around $50,000 and is not intended for home use.</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingNine">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                Will an electric car work in the winter?
              </button>
            </h5>
          </div>
          <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
            <div class="card-body">
              <p>Yes, an electric car will work in the winter. However, the car's range maybe reduced by as much as 20% in freezing conditions. The range maybe reduced further if
              the driver uses the heater.</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTen">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                How do I find public charging stations in my area?
              </button>
            </h5>
          </div>
          <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
            <div class="card-body">
              <p>You can go to the trip planner page on this site to locate some charging stations in your area. You can also go to www.plugshare.com for up-to-date results on new charging stations.</p>
            </div>
          </div>
        </div>
</div>
    <footer class="bg-primary"style=";height:100%;">
      <p>@2018</p>
    </footer>

@endsection
