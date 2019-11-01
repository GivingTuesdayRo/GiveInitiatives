
	<h4 class="filter-title">
		<label for="initiator-type">
			Initiator:
		</label>
	</h4>

	<select id="initiator-type" name="initiator-type" class="form-control">
		<option value="">Select</option>
		<?php
		$args = [
			'taxonomy' => 'initiator-type',
			'orderby'  => 'name',
			'order'    => 'ASC',
			"hide_empty" => 0
		];

		$cats = get_categories( $args );

		foreach ( $cats as $cat ) {
			?>
			<option value="<?php echo $cat->slug ?>"
				<?php echo isset( $_GET['initiator-type'] ) && $_GET['initiator-type'] == $cat->slug ? 'selected' : '' ?>
			>
				<?php echo $cat->name; ?>
			</option>
			<?php
		}
		?>
	</select>