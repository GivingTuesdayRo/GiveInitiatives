<div class="initiative-filter form-group">
	<h4 class="filter-title">
		<label for="initiative-type">
			Tip initiativa:
		</label>
	</h4>

	<select name="initiative-type" class="form-control">
		<option value="">Select</option>
		<?php
		$args = [
			'taxonomy' => 'Initiative Type',
			'orderby'  => 'name',
			'order'    => 'ASC'
		];

		$cats = get_categories( $args );

		foreach ( $cats as $cat ) {
			?>
			<option value="<?php echo $cat->slug ?>"
				<?php echo isset( $_GET['initiative-type'] ) && $_GET['initiative-type'] == $cat->slug ? 'selected' : '' ?>
			>
				<?php echo $cat->name; ?>
			</option>
			<?php
		}
		?>

	</select>
</div>