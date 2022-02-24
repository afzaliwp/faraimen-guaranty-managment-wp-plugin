<?php $pagination = $codes['pagination']; ?>
<div class="tablenav top">
    <div class="alignleft actions">
        <p>تعداد کل درخواست ها: <?php echo number_format( $codes['all'] ); ?></p>
    </div>
	<?php include "pagination.php"; ?>
</div>

<div class="">
	<?php if (isset($message)): ?>
        <div class="notice notice-<?php echo $message['type']; ?> is-dismissible">
            <p><?php echo $message['message']; ?></p>
        </div>
	<?php endif; ?>
</div>
<form action="" method="post">
    <table class="wp-list-table widefat fixed striped table-view-list pages">
        <thead>
        <tr>
            <td id="cb" class="manage-column column-cb check-column">
                <label class="screen-reader-text" for="cb-select-all-1">انتخاب همه</label>
                <input id="cb-select-all-1" type="checkbox">
            </td>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>کد گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ ثبت</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <span>نام و نام خانوادگی</span>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>شماره تماس</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ شروع گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ اتمام گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>توضیحات</span></a>
            </th>

        </tr>
        </thead>

        <tbody id="the-list">
		<?php foreach ( $codes['codes'] as $code ):
            $customer = maybe_unserialize($code->customer);
            $installer = maybe_unserialize($code->installer);
            ?>
            <tr id="" class="iedit author-self level-0 post-12 type-page status-publish hentry">
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="code-<?php echo $code->ID; ?>">انتخاب کد</label>
                    <input id="code-<?php echo $code->ID; ?>" type="checkbox" name="guaranty_request[]"
                           value="<?php echo $code->ID; ?>">
                </th>
                <td class="column"><?php echo $code->code; ?></td>
                <td class="column"><?php echo fi_gregorian_to_jalali( $code->created_at ); ?></td>
                <td class="column"><?php echo $installer['name'] ?: $customer['name']; ?></td>
                <td class="column"><?php echo $installer['phone'] ?: $customer['phone']; ?></td>
                <td class="column"><?php echo $code->started_at; ?></td>
                <td class="column"><?php echo $code->ended_at; ?></td>
                <td class="column"><?php echo $code->request; ?></td>
            </tr>
		<?php endforeach; ?>

        </tbody>

        <tfoot>
        <tr>
            <td id="cb" class="manage-column column-cb check-column">
                <label class="screen-reader-text" for="cb-select-all-1">انتخاب همه</label>
                <input id="cb-select-all-1" type="checkbox">
            </td>
            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>کد گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ ثبت</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <span>نام و نام خانوادگی</span>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>شماره تماس</span></a>
            </th>


            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ شروع گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>تاریخ اتمام گارانتی</span></a>
            </th>

            <!-- Head cell -->
            <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                <a href="#"><span>توضیحات</span></a>
            </th>

        </tr>
        </tfoot>

    </table>

    <div class="tablenav bottom">
        <div class="alignleft actions bulkactions">
            <input type="submit" id="delete_codes" name="delete_codes" class="button action" value="حذف درخواست های انتخاب شده">
            <p>با حذف درخواست، درخواست گارانتی مشتری حذف میشود و تاریخ انقضای گارانتی نیز حذف میشود.</p>
            <p>درصورتی که درخواست گارانتی کاربر مورد تایید نبود، اما همچنان امکان درخواست استفاده از گارانتی را به کاربر می
                دهید، از گزینه حذف استفاده کنید.</p>
        </div>
        <div class="alignleft actions">
        </div>
		<?php include "pagination.php"; ?>
        <br class="clear">
    </div>

</form>