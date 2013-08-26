@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('words.project')) }}</span></h2>	
		<!-- project content -->
		<div id="project-content" class="clearfix">
			<!-- slider -->
			<div class="project-slider">
		        <div class="flexslider">
				  <ul class="slides">
				  	@foreach($project->getImagesAndVideos(940,463) as $imageOrVideo)
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
				<h2 style="line-height:30px">{{ $project->getTitle() }}</h2>
				<div class="clearfix"></div>
			</div>
			<!-- ENDS heading -->
    	
    	
			<div class="project-description">
				{{ $project->getLargeDescription() }}
			</div>
			
			<div class="project-info">
				@if($project->hasDate())
				<p>
					<strong>{{ Lang::get('words.date') }}</strong><br/>
					{{ $project->getDate() }}
				</p>
				@endif
				<p>
				<strong>{{ Lang::get('words.skills') }}</strong><br/>
				{{ $project->getSkills() }}
				</p>
			</div>
			<div class="clearfix"></div>
			
			<div class="project-pager">
				@if($previousProject)
				<a class="previous-project" href="{{ URL::project($previousProject) }}">&#8592; {{ Lang::get('previous_project') }}</a>
				@elseif($nextProject)				
				<a class="next-project" href="{{ URL::project($nextProject) }}">{{ Lang::get('next_project') }} &#8594;</a>
				@endif
			</div>
			
			<!-- related -->
			<div class="related-projects">
				<div class="related-heading">{{ Lang::get('words.related_projects') }}</div>
				<div class="related-list">
					@foreach($relatedProjects as $project)
					<figure>
						<a href="{{ URL::project($project) }}" class="thumb">{{ $project->getMainOrDefaultImage(220, 138)->html() }}</a>
						<a href="{{ URL::project($project) }}" class="heading">{{ $project->getTitle() }}</a>
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