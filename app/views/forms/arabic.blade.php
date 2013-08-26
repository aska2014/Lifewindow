<!-- form -->
<script type="text/javascript" src="js/form-validation.js"></script>
<form id="contactForm" action="#" method="post">
	<h2 class="heading"> للتواصل معنا يرجى ملء استمارة الاتصال أدناه</h2>
	<p> إذا كان لديك أي أسئلة ، أو  
    اذا كان لديك اي استفسار حول خدمات
      </p>
	<fieldset>
		<div>
        <label>الاسم</label>
			<input name="name"  id="name" type="text" class="form-poshytip" title="أدخل أسمك بالكامل" />
			
		</div>
		<div>
        <label>البريد الالكترونى </label>
			<input name="email"  id="email" type="text" class="form-poshytip" title="أدخل إيميلك" />
			
		</div>
        <div>
        <label>الهاتف</label>
			<input name="name"  id="name" type="text" class="form-poshytip" title="أدخل تليفونك" />
			
		</div>
		<div>
			<label>الشركة</label>
			<input name="company"  id="company" type="text" class="form-poshytip" title="الشركة" />
			
		</div>
		<div>
			<textarea  name="message"  id="message" rows="5" cols="20" class="form-poshytip" title="أدخل رسالتك"></textarea>
		</div>
		
		<p><input type="button" value="إرسال" name="submit" id="submit" /> <span id="error" class="warning">Message</span></p>
	</fieldset>
	
</form>
<p id="sent-form-msg" class="success">تم إرسال الرسالة بنجاح. سنتصل بك فى أقرب وقت.</p>
<!-- ENDS form -->