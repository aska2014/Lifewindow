<header class="clearfix">

	<!-- top widget -->
	<div id="top-widget-holder">
		<div class="wrapper">
			<div id="top-widget">
				<div class="padding">
				<ul  class="widget-cols clearfix">

						<li class="first-col">
							
							<div class="widget-block">
								<h4>{{ Lang::get('header.facebook_title') }}</h4>

								<img src="{{ URL::asset('img/loading.gif') }}" style="width:40px; margin-left:40px;" class="loading" />

							</div>
						</li>
						
						<li class="second-col">

							<div class="widget-block">
	                            <h4>{{ Lang::get('header.twitter_title') }}</h4>
								<img src="{{ URL::asset('img/loading.gif') }}" style="width:40px; margin-left:40px;" class="loading" />
							
							</div>
						</li>
						
						<li class="third-col">
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

						
						<li class="fourth-col">
        					@include('master.address')
						</li>	
					</ul>				
				</div>
			</div>
		</div>
		<a href="#" id="top-open">Menu</a>
	</div>
	<!-- ENDS top-widget -->

	<div class="wrapper clearfix">
    
    <!-- logo -->
    
    <a href="{{ URL::to('') }}" id="logo">
        <div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="241" height="90" id="liFe-window" align="middle">
				<param name="movie" value="liFe-window.swf" />
				<param name="quality" value="best" />
				<param name="bgcolor" value="#d4d4d4" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="transparent" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="{{ URL::asset('flash/liFe-window.swf') }}" width="241" height="90">
					<param name="movie" value="liFe-window.swf" />
					<param name="quality" value="best" />
					<param name="bgcolor" value="#d4d4d4" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="transparent" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
    </a>
    

   		<!-- ENDS logo-->
    
        <nav>
			<ul id="nav" class="sf-menu">
				<li class="current-menu-item"><a href="{{ URL::route('home') }}">{{ Str::upper(Lang::get('menu.home')) }}</a></li>
				@if($aboutPage)
				<li><a href="{{ URL::page($aboutPage) }}">{{ Str::upper(Str::limit($aboutPage->getTitle(), $menuChars)) }}</a>
					<? $nestedPages = $aboutPage->getNested(); ?> 
					@if(! $nestedPages->isEmpty())
					<ul>
						@foreach($nestedPages as $page)
						<li><a href="{{ URL::page($page) }}">{{ Str::upper(Str::limit($page->getTitle(), $menuChars)) }}</a></li>
						@endforeach
					</ul>
					@endif
				</li>
				@endif
                <li><a href="{{ URL::route('services') }}">{{ Str::upper(Lang::get('menu.services')) }}</a>
					<ul>
						@foreach($services as $service)
						<li><a href="{{ URL::service( $service ) }}">{{ Str::upper(Str::limit($service->getTitle(), $menuChars)) }}</a></li>
						@endforeach
					</ul>
				</li>
                <li><a href="{{ URL::route('projects') }}">{{ Str::upper(Lang::get('menu.projects')) }}</a>
					<ul>
						@foreach($projects as $project)
						<li><a href="{{ URL::project( $project ) }}">{{ Str::upper(Str::limit($project->getTitle(), $menuChars)) }}</a></li>
						@endforeach
					</ul>
				</li>
				<li><a href="{{ URL::route('all_news') }}">{{ Str::upper(Lang::get('menu.news')) }}</a></li>
				<li><a href="{{ URL::route('contact') }}">{{ Str::upper(Lang::get('menu.contact')) }}</a></li>
				@if(!empty($pages))
				<li><a href="#">{{ Str::upper(Lang::get('menu.more')) }}</a>
					<ul>
						@foreach($pages as $page)
						<li><a href="{{ URL::page( $page ) }}">{{ Str::upper(Str::limit($page->getTitle(), $menuChars)) }}</a>
							<? $nestedPages = $page->getNested(); ?> 
							@if(! $nestedPages->isEmpty())
								<ul>
									@foreach($nestedPages as $nestedPage)
									<li><a href="{{ URL::page( $page ) }}">{{ Str::upper(Str::limit($nestedPage->getTitle(), $menuChars)) }}</a></li>
									@endforeach
								</ul>
							@endif
						</li>
						@endforeach
					</ul>
				</li>
				@endif
			</ul>
			<div id="combo-holder"></div>
		</nav>
	</div>
</header>


