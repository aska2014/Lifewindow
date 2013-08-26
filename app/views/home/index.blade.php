@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper">

		<!-- slider holder -->
		<div id="slider-holder" class="clearfix">
			
            @if($useSlider)
			<!-- slider -->
	        <div class="flexslider home-slider">
			  <ul class="slides">
                @foreach($sliders as $slider)

                    @if($slider->hasImageOrVideo( 620, 305 ))
                    <li>
                        {{ $slider->getImageOrVideo( 620, 305 )->html() }}
                        <p class="flex-caption">{{ $slider->getTitle() }}</p>
                    </li>
                    @endif

                @endforeach
			  </ul>
			</div>
        	<!-- ENDS slider -->
            @endif
        	
        	<div class="home-slider-clearfix "></div>
        	
        	<!-- Headline -->
        	<div id="headline">
               @if(Language::isArabic())
               <h1>نافذة  <br> الحياة  <br> للإنتاج الفني</h1>
               @else
               <h1>Life <br> Window <br> Productions</h1>
               @endif

               @if($useBanner)
               <div id="bannerRotator">     
                  <ul>
                    @foreach(Banner::getAllImages(260, 85) as $bannerImage)

                        <li><a href="#">{{ $bannerImage->html() }}</a></li>

                    @endforeach
                  </ul>
                </div>
                @endif

               <select id="ddSlick-ResetMenu" class="dropdown">
                    <option data-href="{{ route('language', Language::ARABIC ) }}" value="0" data-imagesrc="{{ URL::asset('images/rabia.gif') }}">Arabic</option>
                    <option data-href="{{ route('language', Language::ENGLISH) }}" value="1" data-imagesrc="{{ URL::asset('images/usa-flag.gif') }}">English</option>
               </select>
              
               <em id="corner"> </em>
        	</div>
        	<!-- ENDS headline -->
		</div>
		<!-- ENDS slider holder -->

        @if(!$services->isEmpty())
		<!-- home-block -->
    	<div class="home-block">
    		<h2 class="home-block-heading"><span>{{ Str::upper(Lang::get('home.featured_services')) }}</span></h2>
    		<div class="one-third-thumbs clearfix" >
                <?php $i = 0; ?>
                @foreach($services as $service)
                <?php $i++; ?>
    			<figure <?php if($i%3 == 0) echo 'class="last"'; ?>>
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
    	</div>
    	<!-- ENDS home-block -->
    	@endif

        @if(!$projects->isEmpty())
    	<!-- home-block -->
    	<div class="home-block">
    		<h2 class="home-block-heading"><span>{{ Str::upper(Lang::get('home.latest_projects')) }}</span></h2>
    		<div class="one-fourth-thumbs clearfix">
                <? $i = 0; ?>
                @foreach($projects as $project)
                <? $i++; ?>
                <figure <? if($i%4 == 0) echo 'class="last"'; ?>>
        			<figcaption>
    					<strong>{{ Str::words($project->getTitle(), 6) }}</strong><br />
    					<span>{{ Str::limit($project->getSmallDescription(), $smallBlockChars) }}</span>
    					<em>{{ $project->getDate() }}</em>
    					<a href="{{ URL::project($project) }}" class="opener"></a>
	        		</figcaption>
	        		<a href="{{ URL::project($project) }}"  class="thumb">{{ $project->getMainOrDefaultImage(220, 138)->html() }}</a>
                </figure>
                @endforeach
                
                @if(Language::isArabic())
        		<a href="{{ URL::route('projects') }}" class="more-link left">{{ Lang::get('home.more_projects') }} &#8592;</a>
                @else
                <a href="{{ URL::route('projects') }}" class="more-link right">{{ Lang::get('home.more_projects') }}  &#8594;</a>
                @endif
    		</div>
    	</div>
    	<!-- ENDS home-block -->
        @endif
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

@if($useBanner)
$(document).ready(function(){
    bannerRotator('#bannerRotator', 800, 8000, true);
});
@endif

</script>

@stop