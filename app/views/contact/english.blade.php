@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
	
		
		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('menu.contact')) }}</span></h2>	
    	
		<!-- page content -->
    	<div id="page-content" class="clearfix">
		
		<div id="map_canvas"></div>
		<!-- ENDS Map -->

			<div class="map-content">
				{{ $contact->getDescription() }}
			</div>

			@if(Language::isEnglish())
				@include('forms.english')
			@else
				@include('forms.arabic')
			@endif
			
			<!-- contact sidebar -->
        	<aside id="contact-sidebar">

        		@include('master.address')

        	</aside>
        	<div class="clearfix"></div>
			<!-- ENDS contact-sidebar -->
			
		</div>	        	
    	<!--  page content-->
	</div>
</div>
<!-- ENDS MAIN -->
@stop

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>

    function initialize() {
      var mapOptions = {
        zoom: 4,
        center: new google.maps.LatLng({{ (double)$contact->latitude }}, {{ (double)$contact->longitude }}),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);

      var image = {
        url: '{{ URL::asset("img/google_lifeflag.png") }}',
        // This marker is 20 pixels wide by 32 pixels tall.
        size: new google.maps.Size(23, 27),
        // The origin for this image is 0,0.
        origin: new google.maps.Point(0,0),
        // The anchor for this image is the base of the flagpole at 0,32.
        anchor: new google.maps.Point(0, 32)
      };

      var shape = {
          coord: [1, 1, 1, 20, 18, 20, 18 , 1],
          type: 'poly'
      };

      var marker = new google.maps.Marker({
        position: map.getCenter(),
        animation: google.maps.Animation.DROP,
        map: map,
        title: 'Lifewindow location',
        icon: image,
        shape: shape,
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script> 
@stop