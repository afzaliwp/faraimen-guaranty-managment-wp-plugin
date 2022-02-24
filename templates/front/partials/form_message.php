<div class="message">
	<?php
	if ( isset( $result ) ):
		if ( $result > 0 ) {
			$message_class   = 'fi-message success';
			$message_content = 'اطلاعات شما با موفقیت ذخیره شد.';
		} else {
			$message_class   = 'fi-message error';
			$message_content = 'خطایی رخ داده است. لطفا کد و اطلاعات خود را کنترل کنید و مجددا اقدام کنید.';
		}

		echo sprintf( '<div class="%s"><p>%s</p></div>', $message_class, $message_content );
	endif;
	?>

</div>