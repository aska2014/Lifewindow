@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">


	<section id="gallery">
	  	<div class="container" style="text-align:center">
			<ul id="myRoundabout">
				@foreach($projects as $project)
		        <li> 
		        	@if($image = $project->getRotatorImage(130, 90))
		        	<a href="{{ URL::project($project) }}" class="thumb">{{ $image->html() }}</a>
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
	
		
		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('words.projects')) }}</span></h2>	

		<!-- thumbs -->
		<div class="portfolio-thumbs clearfix" >
			@foreach($projects as $project)
			<figure>
    			<figcaption>
                    <h2 class="rubrich2">{{ Str::words($project->getTitle(), 4) }}</h2><br />
    				<span>{{ Str::limit($project->getSmallDescription(), $largeBlockChars) }}</span>
    				<em>{{ $project->getDate() }}</em>
					<a href="{{ URL::project($project) }}" class="opener"></a>
        		</figcaption>
        		<a href="{{ URL::project($project) }}" class="thumb">{{ $project->getMainOrDefaultImage(300, 188)->html() }}</a>
    		</figure>
    		@endforeach
        </div>
		<!-- ends thumbs-->
		
		
		<!-- pager -->
		<ul class="pager">
			<li class="paged">{{ Lang::get('words.page_1_of') }} {{ $projects->getLastPage() }}</li>
			@for( $i = 1; $i <= $projects->getLastPage(); $i++ )
		
				@if($i == $projects->getCurrentPage())
					<li class="active">
				@else
					<li>
				@endif
		
				<a href="{{ $projects->getUrl($i) }}">{{ $i }}</a></li>
			@endfor
		</ul>
		<div class="clearfix"></div>
    	<!-- ENDS pager -->

    	
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