@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container-fluid">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="img-fluid"style="height:400px;width:100%"src="https://i1.wp.com/electrek.co/wp-content/uploads/sites/3/2017/01/electric-vehicle-charging-vs-gasoline-e1484590338347.jpg?resize=1600%2C792&quality=82&strip=all&ssl=1/800x400" alt="Los Angeles">
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid"style="height:400px;width:100%"src="/6110659344_4825fc6cdb_b.jpg" alt="Chicago"><p class="mr-0"style="margin:0;">Photo Credit: <a href="https://www.flickr.com/photos/20741443@N00/6110659344/">Ian Muttoo</a> Flickr via <a href="http://compfight.com">Compfight</a> <a href="https://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a></p>
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid"style="height:400px;width:100%" src="https://s3.amazonaws.com/plugshare.production.photos/photos/351635.jpg" alt="New York">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  </div>
                  <div class=" newev">
                    <h2 class="text-center">New to Evs?</h2>
                    <div class="row pr-0 pl-0 mr-0 ml-0">
                        <div class="col-sm-4 d-flex flex-column align-items-center pr-0 pl-0 text">
                          <a href="/electricdrift/faq"><i class="far fa-question-circle fa-7x"></i><p class="text-center">F.A.Q</p></a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center pr-0 pl-0 text">
                          <a href="#"><i class="fas fa-charging-station fa-7x"></i><p class="text-center">Fuel comparison</p></a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center pr-0 pl-0 text">
                          <a href="/electricdrift/Why_drive"><i class="fas fa-car fa-7x"></i><p class="text-center">Why Drive Electric</p></a>
                        </div>
                      </div>
                      <div class="currentev">
                        <h2 class="text-center">Already Own An EV?</h2>
                        <div class="row pr-0 pl-0 mr-0 ml-0">
                          <div class="col-sm-6 d-flex flex-column align-items-center pr-0 pl-0 text">
                            <a href="/electricdrift/tripplanner"><i class="fas fa-map-marked-alt fa-7x"></i><p class="text-center">Trip Planner</p></a>
                          </div>
                          <div class="col-sm-6 d-flex flex-column align-items-center pr-0 pl-0 text">
                            <a href="/chargelogs"><i class="fas fa-table fa-7x"></i><p class="text-center">Charge Log</p></a>
                          </div>
                        </div>
                      </div>
                  </div>
        </div>
    </div>
</div>
@endsection
