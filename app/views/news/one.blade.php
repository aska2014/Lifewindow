@extends('master')

@section('content')
<div id="main">	
	<div class="wrapper clearfix">
		<!-- posts list -->
    	<div id="posts-list" class="single-post">
    		
    		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('words.news')) }}</span></h2>
			<article class="format-standard">
				<div class="entry-date"><div class="number">{{ $news->getDate('d') }}</div> <div class="year">{{ $news->getDate('M Y') }}</div></div>
				<div class="feature-image">
					@if($news->hasMainImage(540, 266))
                        <? $image = $news->getMainImage(540, 266); ?>
						<a href="{{ $image->getSource() }}" data-rel="prettyPhoto">{{ $image->html() }}</a>
					@endif
				</div>
				<h2  class="post-heading"><a href="#">{{ $news->getTitle() }}</a></h2>
				<div class="post-content">{{ $news->getLargeDescription() }}</div>
        		</article>
        		
        	</div>
        	<!-- ENDS posts list -->


		<!-- sidebar -->
    	<aside id="sidebar">
    		
           <br/>
           <select id="ddSlick-ResetMenu" class="dropdown">
                <option data-href="{{ route('language', Language::ARABIC ) }}" value="0" data-imagesrc="{{ URL::asset('images/rabia.gif') }}">Arabic</option>
                <option data-href="{{ route('language', Language::ENGLISH) }}" value="1" data-imagesrc="{{ URL::asset('images/usa-flag.gif') }}">English</option>
           </select>
           <br/>

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