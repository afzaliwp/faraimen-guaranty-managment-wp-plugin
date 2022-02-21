<?php var_dump( get_current_screen() ); ?>
<p>تعداد کل درخواست ها: 110</p>
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
            <a href="#"><span>تاریخ اتمام گارانتی</span></a>
        </th>

        <!-- Head cell -->
        <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
            <a href="#"><span>توضیحات</span></a>
        </th>

    </tr>
    </thead>

    <tbody id="the-list">
    <tr id="" class="iedit author-self level-0 post-12 type-page status-publish hentry">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="########">انتخاب درخواست</label>
            <input id="########" type="checkbox" name="guaranty_request[]" value="#########">
        </th>
        <td class="column">نام</td>
        <td class="column">شماره</td>
        <td class="column">کد</td>
        <td class="column">تاریخ</td>
        <td class="column">اتمام</td>
        <td class="column">توضیحات</td>
    </tr>

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
        <p>با حذف درخواست، درخواست گارانتی مشتری حذف میشود و تاریخ انقضای گارانتی نیز حذف میشود.</p>
        <p>درصورتی که درخواست گارانتی کاربر مورد تایید نبود، اما همچنان امکان درخواست استفاده از گارانتی را به کاربر می
            دهید، از گزینه حذف استفاده کنید.</p>
    </div>
    <div class="alignleft actions">
    </div>
    <div class="tablenav-pages"><span class="displaying-num">20 مورد</span>
        <span class="pagination-links">
            <a class="previous-page button" href="<?php echo esc_url( add_query_arg( [ 'paged' => '1' ] ) ) ?>">
                <span aria-hidden="true">‹ <small>قبلی</small></span>
            </a>
            <span class="screen-reader-text">صفحه فعلی</span>
            <span id="table-paging" class="paging-input">
                <span class="tablenav-paging-text">
                    <span>2 از</span>
                    <span class="total-pages"> کل صفحه ها</span>
                </span>
            </span>

            <a class="next-page button" href="<?php echo esc_url( add_query_arg( [ 'paged' => '3' ] ) ) ?>">
                <span aria-hidden="true"><small>بعدی</small> ›</span>
            </a>
        </span>
    </div>
    <br class="clear">
</div>