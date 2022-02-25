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
		<td class="column"><?php echo $code->started_at ? fi_gregorian_to_jalali($code->started_at) : '-'; ?></td>
		<td class="column"><?php echo $code->ended_at ? fi_gregorian_to_jalali($code->ended_at) : '-'; ?></td>
		<td class="column"><?php echo $code->request; ?></td>
	</tr>
<?php endforeach; ?>
</tbody>