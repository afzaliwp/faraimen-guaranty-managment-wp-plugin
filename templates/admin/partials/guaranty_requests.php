<p>تعداد کل درخواست ها: <?php echo number_format($codes['all']); ?></p>
<table class="wp-list-table widefat fixed striped table-view-list pages">
    <thead>
    <tr>
        <td id="cb" class="manage-column column-cb check-column">
            <label class="screen-reader-text" for="cb-select-all-1">انتخاب همه</label>
            <input id="cb-select-all-1" type="checkbox">
        </td>
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
            <a href="#"><span>کد گارانتی</span></a>
        </th>

        <!-- Head cell -->
        <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
            <a href="#"><span>تاریخ ثبت</span></a>
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

    <?php include "table_body.php"; ?>

    <tfoot>
    <tr>
        <td id="cb" class="manage-column column-cb check-column">
            <label class="screen-reader-text" for="cb-select-all-1">انتخاب همه</label>
            <input id="cb-select-all-1" type="checkbox">
        </td>
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
            <a href="#"><span>کد گارانتی</span></a>
        </th>

        <!-- Head cell -->
        <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
            <a href="#"><span>تاریخ ثبت</span></a>
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
        <input type="submit" id="delete_requests" class="button action" value="حذف درخواست های انتخاب شده">
        <p>با حذف درخواست، کد و تاریخ انقضای گارانتی نیز حذف میشود.</p>
    </div>
    <div class="alignleft actions">
    </div>

    <?php
    $pagination = $codes['pagination'];
    include "pagination.php";
    ?>
    <br class="clear">
</div>