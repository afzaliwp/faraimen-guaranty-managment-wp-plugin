<div class="wrap" id="fi-admin">
	<h1 class="wp-heading-inline">درخواست های گارانتی ثبت شده</h1>
    <?php
    $codes = fi_get_requests();
    include "partials/guaranty_requests.php";
    ?>
</div>