@extends('layouts.app')
@section('content')
<div class="bg-primary">
  <div class="container-fluid col-9">
    <div id="afdc-stations"><div id="afdc-stations-loading">Loading alternative fueling station locator...</div></div><script type="text/javascript">window.afdcStationsOptions = {"country":"all","localeCountry":"US","path":"/find/nearest","query":{}}</script><script async defer src="https://widgets.nrel.gov/afdc/station-locator/assets/embed.js"></script><noscript>Please enable JavaScript to view the alternative fueling station locator.</noscript>
  </div>
</div>
@endsection
