<?php
global $post;
// Regular
$aRows[] = array('label' => 'City', 'name' => 'wps_tc_city', 'value' => get_post_meta( $post->ID, 'wps_tc_city', true ) , 'type' => 'text', 'class' => 'regular-text');
$aRows[] = array('label' => 'Country', 'name' => 'wps_tc_country', 'value' => get_post_meta( $post->ID, 'wps_tc_country', true ) , 'type' => 'text', 'class' => 'regular-text');


?>
<div class="option-section tbs-section">
	<div class="option-section-inner tbs-section-inner" id="postcustomstuff">
		<p><strong>User Info</strong></p>
		<table id="list-table">
			<tbody id="the-list">
				<?php foreach ($aRows as $key => $aRow) { ?>
					<tr>
						<td class="left"><?php echo $aRow['label']; ?></td>
						<td><input type="<?php echo $aRow['type']; ?>" name="tbs_fields[<?php echo $aRow['name']; ?>]" id="<?php echo $aRow['name']; ?>" class="<?php echo $aRow['class']; ?>" value="<?php echo $aRow['value']; ?>"></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>