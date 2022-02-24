<?php if (isset($result)): ?>

<div class="fi-result result inquiry">
	<p>کد: <strong><?php echo $result->code; ?></strong></p>

	<?php
	if ($result->type == INSTALLER){
		$installer = maybe_unserialize($result->installer);
		echo '<p>نوع کد: <strong>نصاب</strong></p>';
		echo sprintf('<p>اطلاعات نصاب: <strong>%s, %s</strong></p>', $installer['name'], $installer['phone']);
	}

	if ($result->type == CUSTOMER){
		$customer = maybe_unserialize($result->customer);
		echo '<p>نوع کد: <strong>مشتری</strong></p>';
		echo sprintf('<p>اطلاعات مشتری: <strong>%s, %s</strong></p>', $customer['name'], $customer['phone']);
	}
	?>

	<p>تاریخ ثبت کد: <strong><?php echo fi_gregorian_to_jalali($result->created_at); ?></strong></p>
	<p>تاریخ شروع گارانتی: <strong><?php echo $result->started_at ? fi_gregorian_to_jalali($result->started_at) : 'ثبت نشده'; ?></strong></p>
	<p>تاریخ اتمام گارانتی: <strong><?php echo $result->ended_at ? fi_gregorian_to_jalali($result->ended_at) : 'ثبت نشده'; ?></strong></p>
</div>

<?php endif;