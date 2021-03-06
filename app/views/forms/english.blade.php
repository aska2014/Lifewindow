<!-- form -->
<script type="text/javascript" src="js/form-validation.js"></script>
<form id="contactForm" action="{{ $postUrl }}" method="post">
	<h2 class="heading">Contact us using this form</h2>
	<p> If you have any questions, or if you have any questions about the services.</p>
	<fieldset>
		<div>
            <label>Name</label>
			<input name="name" id="name" type="text" class="form-poshytip" title="Enter your full name" />
			
		</div>
		<div>
        
            <label>Email</label>
			<input name="email" id="email" type="text" class="form-poshytip" title="Enter your email address" />
			
		</div>
        <div>
            <label>Phone</label>
			<input name="phone" id="phone" type="text" class="form-poshytip" title="Enter your Phone" />
			
		</div>
		<div>
			<label>Company</label>
			<input name="company" id="company" type="text" class="form-poshytip" title="Enter your company" />
			
		</div>
		<div>
			<textarea name="content" id="content" rows="5" cols="20" class="form-poshytip" title="Enter your message"></textarea>
		</div>
		
		<p><input type="button" value="Send" name="submit" id="submit" /> <span id="error" class="warning">Message</span></p>
	</fieldset>
	
</form>
<p id="sent-form-msg" class="success">Form data sent. We will get back to you as soon as possible.</p>
<!-- ENDS form -->