<footer>
	<div class="wrapper">
	
		<ul  class="widget-cols clearfix">
			<li class="first-col">
				
				<div class="widget-block">
					<h4>{{ Str::upper(Lang::get('footer.latest_news')) }}</h4>
					@foreach($news as $new)
					<div class="recent-post">
						<a href="{{ URL::news($new) }}" class="thumb">{{ $new->getMainOrDefaultImage(54, 54)->html() }}</a>
						<div class="post-head">
							<a href="{{ URL::news($new) }}">{{ $new->getTitle() }}</a><span> {{ $new->getDate() }}</span>
						</div>
					</div>
					@endforeach
				</div>
			</li>
			
			<li class="second-col">
				
				<div class="widget-block">
					<h4>{{ $footer->getTitle( Footer::FIRST_SECTION ) }}</h4>
					<p>{{ $footer->getDescription( Footer::FIRST_SECTION ) }}</p>
				</div>
				
			</li>
			
			 <li class="second-col">
				<div class="widget-block">
					<h4>{{ $footer->getTitle( Footer::SECOND_SECTION ) }}</h4>
					<p>{{ $footer->getDescription( Footer::SECOND_SECTION ) }}</p>
				</div>
			</li>
			
			<li class="fourth-col">
				@include('master.address')
			</li>
		</ul>				
		
		
		<div class="footer-bottom">
			<div class="{{ Language::isArabic() ? 'right' : 'left' }}">{{ Str::upper(Lang::get('footer.copyright')) }}<a href="{{ URL::to('') }}" >{{ Str::upper(Lang::get('footer.life_window')) }}</a></div>
			<div class="{{ Language::isArabic() ? 'left'  : 'right' }}">
                <ul id="social-bar">
                	@if($links->facebook)
					<li><a href="{{ $links->facebook }}"  title="Follow my facebook"  class="poshytip"><img src="{{ URL::asset('img/social/facebook.png') }}"  alt="Facebook"    /></a></li>
					@endif

					@if($links->twitter)
					<li><a href="{{ $links->twitter }}"  title="Follow my tweets"    class="poshytip"><img src="{{ URL::asset('img/social/twitter.png') }}"   alt="twitter"     /></a></li>
					@endif
					
					@if($links->google)
					<li><a href="{{ $links->google }}"  title="Add to the circle"   class="poshytip"><img src="{{ URL::asset('img/social/plus.png') }}"      alt="Google plus" /></a></li>
					@endif
                    
					@if($links->youtube)
                    <li><a href="{{ $links->youtube }}"  title="Follow my youtube"   class="poshytip"><img src="{{ URL::asset('img/social/youtube.png') }}"   alt="youtube"     /></a></li>
					@endif
                    
					@if($links->skype)
                    <li><a href="{{ $links->skype }}"  title="Add to the skype"    class="poshytip"><img src="{{ URL::asset('img/social/skype.png') }}"     alt="skype"       /></a></li>
					@endif
                    
					@if($links->linkedin)
                    <li><a href="{{ $links->linkedin }}"  title="Add to the linkedin" class="poshytip"><img src="{{ URL::asset('img/social/linkedin.png') }}"  alt="linkedin"    /></a></li>
					@endif
                    
					@if($links->flicker)
                    <li><a href="{{ $links->flicker }}"  title="Add to the flickr"   class="poshytip"><img src="{{ URL::asset('img/social/flickr.png') }}"    alt="flickr"      /></a></li>
					@endif
				</ul>
			</div>
		</div>
		
	</div>
    <div class="footer-bottom2">
    
    </div>
    
</footer>