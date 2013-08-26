<h2>Message from Life window contact us form.</h2><br />
<b>Name: </b> {{ $name }}<br />
<b>Email: </b> {{ $email }}<br />
<b>Phone: </b> {{ $phone }}<br />
<b>Company: </b> {{ $company }}<br />
<p>
	{{ $content }}
</p>

<br /><br />

<p><i>Sent at {{ date('F j, Y H:i:s', strtotime($created_at)) }}</i></p>