<div class="tablenav-pages">
    <?php $disabled_prev = $pagination['current'] == 1 ? 'disabled' : ''; ?>
    <?php $disabled_next = $pagination['current'] == $pagination['pages'] ? 'disabled' : ''; ?>
	<span class="pagination-links">
            <a class="previous-page button" <?php echo $disabled_prev; ?> href="<?php echo esc_url( add_query_arg( [ 'codes-page' => $pagination['current'] - 1 ] ) ) ?>">
                <span aria-hidden="true">‹ <small>قبلی</small></span>
            </a>
            <span class="screen-reader-text">صفحه فعلی</span>
            <span id="table-paging" class="paging-input">
                <span class="tablenav-paging-text">
                    <span>صفحه <?php echo $pagination['current']; ?></span>
                </span>
            </span>

            <a class="next-page button" <?php echo $disabled_next; ?> href="<?php echo esc_url( add_query_arg( [ 'codes-page' => $pagination['current'] + 1 ] ) ) ?>">
                <span aria-hidden="true"><small>بعدی</small> ›</span>
            </a>
        </span>
    <span>کل صفحه ها: <?php echo $pagination['pages'] ?></span>
</div>