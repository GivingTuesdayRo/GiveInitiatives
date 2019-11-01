
    <h4 class="filter-title">
        <label for="campaign-year">
            Campanie:
        </label>
    </h4>

    <select name="campaign-year" class="form-control">
        <option value="">Select</option>
		<?php
		$args = [
			'taxonomy' => 'campaign-year',
			'orderby'  => 'name',
			'order'    => 'ASC',
			"hide_empty" => 0
		];

		$cats = get_categories( $args );

		foreach ( $cats as $cat ) {
			?>
            <option value="<?php echo $cat->slug ?>"
				<?php echo isset( $_GET['campaign-year'] ) && $_GET['campaign-year'] == $cat->slug ? 'selected' : '' ?>
            >
				<?php echo $cat->name; ?>
            </option>
			<?php
		}
		?>

    </select>