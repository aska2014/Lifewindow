@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('words.service')) }}</span></h2>	
		<!-- project content -->
		<div id="project-content" class="clearfix">
			<!-- slider -->
			<div class="project-slider">
		        <div class="flexslider">
				  <ul class="slides">
				  	@foreach($service->getImagesAndVideos(940,463) as $imageOrVideo)
				    <li>
				    	{{ $imageOrVideo->html() }}
				    </li>
				    @endforeach
				  </ul>
				</div>
			</div>
        	<!-- ENDS slider -->
        	
        	<!-- heading -->
			<div class="project-heading">
				<h2 style="line-height:30px">{{ $service->getTitle() }}</h2>
				<div class="clearfix"></div>
			</div>
			<!-- ENDS heading -->
    	
    	
			<div class="project-description">
				{{ $service->getLargeDescription() }}
			</div>
			
			<div class="project-info">
				@if($service->hasDate())
				<p>
					<strong>{{ Lang::get('words.date') }}</strong><br/>
					{{ $service->getDate() }}
				</p>
				@endif
			</div>
			<div class="clearfix"></div>
			
			<div class="project-pager">
				@if($previousService)
				<a class="previous-project" href="{{ URL::service($previousService) }}">&#8592; {{ Lang::get('words.previous_service') }}</a>
				@elseif($nextService)				
				<a class="next-project" href="{{ URL::service($nextService) }}">{{ Lang::get('words.next_service') }} &#8594;</a>
				@endif
			</div>
			
			<!-- related -->
			<div class="related-projects">
				<div class="related-heading">{{ Str::upper(Lang::get('words.realted_services')) }}</div>
				<div class="related-list">
					@foreach($relatedServices as $service)
					<figure>
						<a href="{{ URL::service($service) }}" class="thumb">{{ $service->getMainOrDefaultImage(220, 138)->html() }}</a>
						<a href="{{ URL::service($service) }}" class="heading">{{ $service->getTitle() }}</a>
					</figure>
					@endforeach
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- ENDS related -->
			
		</div>	        	
    	<!--  ENDS project content-->
	</div>
</div>
<!-- ENDS MAIN -->
@stop