<script src="{{ URL::asset('swfs/js/swfobject.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	var flashvars = {
		xmlUrl: "http://www.lifewindow.tv/{{ $rotatorType }}-xml"
	};
	var params = {
		menu: "false",
		scale: "noScale",
		allowFullscreen: "true",
		allowScriptAccess: "always",
		bgcolor: "#EBEBEB"
	};
	var attributes = {
		id:"slider"
	};
	swfobject.embedSWF("{{ URL::asset('swfs/slider.swf') }}", "altContent", "700px", "200px", "10.0.0", "{{ URL::asset('swfs/expressInstall.swf') }}", flashvars, params, attributes);
</script>