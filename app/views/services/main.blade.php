@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	

    <section id="gallery">
	  	<div class="container" style="text-align:center">
			<ul id="myRoundabout">
				@foreach($rotatingServices as $service)
		        <li> 
		        	@if($image = $service->getRotatorImage(130, 90))
		        	<a href="{{ URL::service($service) }}" class="thumb">{{ $image->html() }}</a>
		        	@endif
		        </li>
		        @endforeach
		    </ul>
		    @if($useRotator)

		    	@include('rotator.index')

	        @endif
	  	</div>
	  </section>
	<div class="wrapper clearfix">
	
		
		<h2 class="page-heading"><span>{{ $subTitle }}</span></h2>	

		<!-- thumbs -->
		<div class="portfolio-thumbs clearfix" >
			@foreach($services as $service)
			<figure>
    			<figcaption>
                    <h2 class="rubrich2">{{ Str::words($service->getTitle(), 4) }}</h2><br />
    				<span>{{ Str::limit($service->getSmallDescription(), $largeBlockChars) }}</span>
    				<em>{{ $service->getDate() }}</em>
					<a href="{{ URL::service($service) }}" class="opener"></a>
        		</figcaption>
        		<a href="{{ URL::service($service) }}" class="thumb">{{ $service->getMainOrDefaultImage(300, 188)->html() }}</a>
    		</figure>
    		@endforeach
        </div>
		<!-- ends thumbs-->
    	
	</div>
</div>
<!-- ENDS MAIN -->
@stop

@section('top_scripts')
	
	@include('rotator.scripts')

@stop

@section('scripts')
<script type="text/javascript">
	try {
	  var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
	  if(fo)
	  {
	  	hasFlash();
	  }
	}catch(e){
	  if(navigator.mimeTypes ["application/x-shockwave-flash"] != undefined)
	  {
	  	hasFlash();
	  }
	}

	function hasFlash()
	{
		$("#myRoundabout").remove();
	}
	
	$(window).resize(function()
	{
		if($(window).width() < 800)
		{
			$("#gallery").hide();
		}
		else
		{
			$("#gallery").show();
		}
	});
</script>

@stop