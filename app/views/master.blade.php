<!doctype html>

@if(Language::isEnglish())
<html class="no-js">
@else
<html class="no-js" dir="rtl">
@endif
	<head>
		<meta charset="utf-8"/>
		<title>{{ $title }}</title>
		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		{{ Asset::styles() }}
	
		{{ Asset::scripts() }}

		@yield('top_scripts')

		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>

		@if(Language::isArabic())
		<style type="text/css">
			.one-third-thumbs figure, .one-fourth-thumbs figure, .portfolio-thumbs figure, .related-projects figure{float:right; margin-right:0px; margin-left:20px;}
			figure.last{margin-left:0px;}
		</style>
		@endif

	</head>
	
	<body lang="en">
	
	@include('master.header')

	@yield('content')

	@include('master.footer')

	<script type="text/javascript">
	function MM_jumpMenuGo(objId,targ,restore){ //v9.0
	  var selObj = null;  with (document) { 
	  if (getElementById) selObj = getElementById(objId);
	  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0; }
	}
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0;
	}

	$(document).ready(function()
	{
		requestTwitter();
		requestFacebook();
	});

	function requestFacebook()
	{
		$.ajax({
			cache:false,
			url: "{{ URL::route('request-facebook') }}",
			type:"GET",
			success:function(facebook)
			{
				printSocial( facebook, $("header").find('.first-col').find('.widget-block') );
			}
		});
	}

	function requestTwitter()
	{
		$.ajax({
			cache:false,
			url: "{{ URL::route('request-twitter') }}",
			type:"GET",
			success:function(twitter)
			{
				printSocial( twitter, $("header").find('.second-col').find('.widget-block') );
			}
		});
	}

	function printSocial( social, socialObj )
	{
		if (social instanceof Array) {
			if(social.length > 0)
				socialObj.find('.loading').remove();

			for (var i = 0; i < social.length; i++) {

				socialObj.append('<div class="recent-post"><a href="' + social[i].link + '"><img src="{{ URL::asset("img/logo.jpg") }}" alt="Post" width="50" /></a><div class="post-head" style="width:160px;"><a href="' + social[i].link + '">' + social[i].title + '</a><span> ' + social[i].date + '</span></div></div>');

			};
		}
	}

    </script>
    
	@yield('scripts')

	</body>
</html>