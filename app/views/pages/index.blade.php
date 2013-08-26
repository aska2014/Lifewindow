@extends('master')

@section('content')


<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
    	
		<!-- page content -->
    	<div id="page-content" class="clearfix">
	
			<!-- floated content -->
			<div class="floated-content">
			
				<h2 class="page-heading"><span>{{ $page->getTitle() }}</span></h2>
				
				{{ $page->getLargeDescription() }}
				
			</div>
			<!-- ends fullwidth content -->
			
			<!-- sidebar -->
        	<aside id="sidebar">
            
	            
	             <br> 
	        
	         <!--select lang-img -->
               <select id="ddSlick-ResetMenu" class="dropdown">
                    <option data-href="{{ route('language', Language::ARABIC ) }}" value="0" data-imagesrc="{{ URL::asset('images/rabia.gif') }}">Arabic</option>
                    <option data-href="{{ route('language', Language::ENGLISH) }}" value="1" data-imagesrc="{{ URL::asset('images/usa-flag.gif') }}">English</option>
               </select>
	           <!--end lang-img -->
	    		<br>
        		
	    		<ul>
	        		<li class="block">
		        		<h4>{{ Str::upper(Lang::get('words.services')) }}</h4>
						<ul>
							@foreach($services as $service)
							<li class="cat-item"><a href="{{ URL::service($service) }}">{{ $service->getTitle() }}</a></li>
							@endforeach
						</ul>
	        		</li>
	        		
	        		<li class="block">
		        		<h4>{{ Str::upper(Lang::get('words.projects')) }}</h4>
						<ul>
							@foreach($projects as $project)
							<li class="cat-item"><a href="{{ URL::project($project) }}">{{ $project->getTitle() }}</a></li>
							@endforeach
						</ul>
	        		</li>
	    		
	    		</ul>
        		<em id="corner"></em>
        	</aside>
			<!-- ENDS sidebar -->
			
		</div>	        	
    	<!--  page content-->
	</div>
</div>
<!-- ENDS MAIN -->

@stop
@section('scripts')

<script type="text/javascript">
$(function() {

    $('#ddSlick-ResetMenu').ddslick({
        width: '100%',
        @if(Language::isArabic())
        selectText: 'إختيار اللغة ',
        @else
        selectText: 'Select Language',
        @endif
        resetmenu: true,
        defaultTarget: "_self"
    });
});
</script>

@stop