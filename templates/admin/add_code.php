<div class="wrap" id="fi-admin">
    <h1 class="wp-heading-inline">افزودن کد های گارانتی</h1>
    <?php if (isset($message)): ?>
    <div class="notice notice-<?php echo $message['type']; ?> is-dismissible">
        <p><?php echo $message['message']; ?></p>
    </div>
    <?php endif; ?>

    <div id="dashboard-widgets" class="fi-box-wrapper">
        <div id="dashboard-widgets-wrap" class="metabox-holder">

            <div id="installers_codes_box" class="postbox">
                <div class="postbox-header">
                    <h2 class="hndle ui-sortable-handle is-non-sortable">کدهای مشتریان</h2>
                </div>
                <div class="inside">
                    <div class="description">
						<?php include "partials/customers_code_form.php"; ?>
                    </div>
                </div>
            </div>

            <div id="customers_codes_box" class="postbox">
                <div class="postbox-header">
                    <h2 class="hndle ui-sortable-handle is-non-sortable">کدهای نصاب ها</h2>
                </div>
                <div class="inside">
                    <div class="description">
						<?php include "partials/installer_codes_form.php"; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>