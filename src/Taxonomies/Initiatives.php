<?php

namespace GivingTuesdayRo\GiveInitiatives\Taxonomies;

use PostTypes\PostType;

/**
 * Class Initiatives
 * @package GivingTuesdayRo\GiveInitiatives\Taxonomies
 */
class Initiatives extends AbstractTaxonomy {

	const TAXONOMY_TYPE = 'initiative';

	protected function defineTaxonomy() {
		$initiatives = new PostType(
			self::TAXONOMY_TYPE,
			[
				'supports'     => [ 'title', 'editor', 'thumbnail', 'tags', 'custom-fields' ],
				'show_in_rest' => true,
				'has_archive' => true
			]
		);

		// Add the genre taxonomy to the book post type
		$initiatives->taxonomy( 'Campaign Year' );

		$initiatives->taxonomy( 'Initiative Type' );
		$initiatives->taxonomy( 'Initiator Type' );
		$initiatives->taxonomy( 'Beneficiary Type' );

		$initiatives->taxonomy( 'post_tag' );

//        $initiatives->filters(['year', 'post_tag']);
	}
}