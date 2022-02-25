<?php include "partials/form_message.php"; ?>
<form action="" method="post" id="guaranty_form" class="fi-form guaranty">
	<div class="fi-field guaranty_code">
		<label for="guaranty_code">کد گارانتی</label>
		<input required type="number" name="guaranty_code" id="guaranty_code" placeholder="12345678901">
	</div>

	<div class="fi-field explanation">
		<label for="explanation">توضیحات</label>
		<textarea required name="explanation" id="explanation" placeholder="علت درخواست را شرح دهید."></textarea>
	</div>

	<div class="fi-field submit">
		<input type="submit" name="guaranty_send_request" value="ارسال">
	</div>
</form>