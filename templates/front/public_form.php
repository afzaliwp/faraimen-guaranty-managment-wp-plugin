<?php include "partials/form_message.php"; ?>
<form action="" method="post" id="public_form" class="fi-form public">
    <div class="fi-field guaranty_code">
        <label for="guaranty_code">کد قرعه کشی</label>
        <input required type="number" name="guaranty_code" id="guaranty_code" placeholder="12345678901">
    </div>

    <div class="fi-field customer_name">
        <label for="customer_name">نام شما</label>
        <input required type="text" name="customer_name" id="customer_name" placeholder="علی احمدی">
    </div>

    <div class="fi-field customer_phone">
        <label for="customer_phone">شماره تماس شما</label>
        <input required type="text" name="customer_phone" id="customer_phone" placeholder="09123456789">
    </div>

    <div class="fi-field submit">
        <input type="submit" name="public_send_code" value="ارسال">
    </div>
</form>