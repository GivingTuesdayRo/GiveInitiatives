
	<h4 class="filter-title">
		<label for="beneficiary-type">
			<?php echo __( 'Beneficiary Type', GIVE_INITIATIVES_TEXT_DOMAIN ); ?>:
		</label>
	</h4>

	<select id="beneficiary-type" name="beneficiary-type" class="form-control">
		<option value="">Select</option>
		<?php
		$args = [
			'taxonomy' => 'beneficiary-type',
			'orderby'  => 'name',
			'order'    => 'ASC',
			"hide_empty" => 0
		];

		$cats = get_categories( $args );

		foreach ( $cats as $cat ) {
			?>
			<option value="<?php echo $cat->slug ?>"
				<?php echo isset( $_GET['beneficiary-type'] ) && $_GET['beneficiary-type'] == $cat->slug ? 'selected' : '' ?>
			>
				<?php echo $cat->name; ?>
			</option>
			<?php
		}
		?>
	</select>