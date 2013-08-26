@extends('master')

@section('content')
<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
	
		
		<h2 class="page-heading"><span>تواصل معنا </span></h2>	
    	
		<!-- page content -->
    	<div id="page-content" class="clearfix">
			
		<!-- Map -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true" /></script>
		<script type="text/javascript">
			function initialize() {
				var latlng = new google.maps.LatLng(-34.397, 150.644);
				var myOptions = {
				  zoom: 8,
				  center: latlng,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas"),
			    myOptions);
			}
		</script>
		
		<div id="map_canvas"></div>
		<!-- ENDS Map -->
			<div class="map-content">
				 

يرجى الاتصال بنا للحصول على مزيد من المعلومات التي قد تحتاجها. سوف تجد جميع العاملين لدينا   على دراية واستعداد لمساعدتكم في جميع الأوقات.  .

أرسل لنا رسالة أو البريد الإلكتروني وسوف نقوم بالرد عليك فورا أو ترتيب زيارة معكم لاستعراض الاحتياجات الخاصة بك .
			</div>
			
			
			
			
			<!-- contact sidebar -->
        	<aside id="contact-sidebar">
        		<div class="block">
	        		<h4>الفروع </h4>
                    <h6>  الرياض  </h6>
	        		<p> </p>
	        		
	        		<ul class="address-block">
	        			<li class="address">العنوان، المدينة، الرمز البريدي</li>
	        			<li class="phone">+123 456 789</li>
	        			<li class="mobile">+123 456 789</li>
	        			<li class="email"><a href="mailto:email@server.com">info@lifewindow.com</a></li>
	        		</ul>
                      <h6>    </h6>
                    <h6>  جدة </h6>
	        		<p> </p>
	        		
	        		<ul class="address-block">
	        			<li class="address">العنوان، المدينة، الرمز البريدي</li>
	        			<li class="phone">+123 456 789</li>
	        			<li class="mobile">+123 456 789</li>
	        			<li class="email"><a href="mailto:email@server.com">info@lifewindow.com</a></li>
	        		</ul>
	        		
        		</div>	        	
        	</aside>
        	<div class="clearfix"></div>
			<!-- ENDS contact-sidebar -->
			
		</div>	        	
    	<!--  page content-->
    	
    	

    	
	</div>
</div>
<!-- ENDS MAIN -->
@stop