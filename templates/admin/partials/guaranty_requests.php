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

    <tbody id="the-list">
	<?php foreach ($codes['codes'] as $code): ?>
        <tr id="" class="iedit author-self level-0 post-12 type-page status-publish hentry">
            <th scope="row" class="check-column">
                <label class="screen-reader-text" for="code-<?php echo $code->ID; ?>">انتخاب کد</label>
                <input id="code-<?php echo $code->ID; ?>" type="checkbox" name="guaranty_request[]" value="<?php echo $code->ID; ?>">
            </th>
            <td class="column"><?php echo $code->installer ?: $code->customer; ?></td>
            <td class="column"><?php echo $code->installer ?: $code->customer; ?></td>
            <td class="column"><?php echo $code->code; ?></td>
            <td class="column"><?php echo $code->created_at; ?></td>
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