@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
		<!-- posts list -->
    	<div id="posts-list">
    	
    		<h2 class="page-heading"><span>{{ Str::upper(Lang::get('words.news')) }}</span></h2>	

    		@foreach($news as $new)
			<article class="format-standard">
				<div class="entry-date"><div class="number">{{ $new->getDate('d') }}</div> <div class="year">{{ $new->getDate('M Y') }}</div></div>
				<? $image = $new->getMainOrDefaultImage(540, 266); ?>
				<div class="feature-image">
					<a href="{{ $image->getSource() }}" data-rel="prettyPhoto">{{ $image->html() }}</a>
				</div>
				<h2  class="post-heading"><a href="{{ URL::news($new) }}">{{ $new->getTitle() }}</a></h2>
				<div class="excerpt">
					{{ $new->getSmallDescription() }}
				</div>
				<a href="{{ URL::news($new) }}" class="read-more">{{ Str::upper(Lang::get('words.continue')) }} &#8594;</a>
			</article>
			@endforeach
			
			<!-- page-navigation -->
			<div class="page-navigation clearfix">
				@if($news->getCurrentPage() < $news->getLastPage())
				<div class="nav-next">
					@if(Language::isArabic())
					<a href="{{ $news->getUrl( $news->getCurrentPage() + 1 ) }}" style="font-weight:bold; font-size:15px;">أخبار قديمة &#8592; </a>
					@else
    				<a href="{{ $news->getUrl( $news->getCurrentPage() + 1 ) }}">&#8592; Older Entries </a>
					@endif
				</div>
				@endif
				@if($news->getCurrentPage() > 1)
				<div class="nav-previous">
					@if(Language::isArabic())
				    <a href="{{ $news->getUrl( $news->getCurrentPage() - 1 ) }}" style="font-weight:bold; font-size:15px;"> &#8594; أخبار حديثة</a> 
				    @else
    				<a href="{{ $news->getUrl( $news->getCurrentPage() - 1 ) }}">Newer Entries &#8594;</a> 
				    @endif
				</div>
				@endif
			</div>
			<!--ENDS page-navigation -->
			
		
    		
    		
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