<?php include "partials/inquiry_result.php"; ?>
<form action="" method="post" id="inquiry_form" class="fi-form inquiry">
	<div class="fi-field guaranty_code">
		<label for="guaranty_code">کد قرعه کشی</label>
		<input required type="number" name="guaranty_code" id="guaranty_code" placeholder="12345678901">
	</div>

	<div class="fi-field submit">
		<input type="submit" name="inquiry_send_code" value="ارسال">
	</div>
</form>