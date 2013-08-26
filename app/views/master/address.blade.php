<div class="widget-block">
	<h4>{{ Str::upper(Lang::get('footer.address')) }}</h4>
	<p>{{ $address->getDescription() }}</p>
	<ul class="address-block">
		@if($the_address = $address->getAddress())
		<li class="address">{{ $the_address }}</li>
		@endif
		@if($phone = $address->getPhone())
		<li class="phone">{{ $phone }}</li>
		@endif
		@if($mobile = $address->getMobile())
		<li class="mobile">{{ $mobile }}</li>
		@endif
		@if($email = $address->getEmail())
		<li class="email"><a href="mailto:email@server.com">{{ $email }}</a></li>
		@endif
	</ul>
</div>