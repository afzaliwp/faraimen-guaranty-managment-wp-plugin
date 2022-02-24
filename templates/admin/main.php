<div class="wrap">
	<h1 class="wp-heading-inline">مدیریت گارانتی ها</h1>
    <?php
    if (isset($_POST['delete_codes'])){
	    $delete_results = fi_delete_codes($_POST['guaranty_request']);

	    $message = [ 'type' => 'error', 'message' => 'خطایی پیش آمده است. لطفا ورودی ها را چک کنید و مجددا اقدام کنید.' ];
	    if ( $delete_results ) {
		    $message = [ 'type' => 'success', 'message' => 'کد ها با موفقیت حذف شدند.' ];
	    }
    }

    $codes = fi_get_codes();

    include "partials/all_codes.php";
    ?>
</div>