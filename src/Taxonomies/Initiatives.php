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
			[
				'name'     => self::TAXONOMY_TYPE,
				'slug'     => self::TAXONOMY_TYPE,
				'singular' => __( 'Initiative', 'give' ),
				'plural'   => __( 'Initiatives', 'give' ),
			],
			[
				'supports'     => [ 'title', 'editor', 'thumbnail', 'tags', 'custom-fields' ],
				'show_in_rest' => true,
				'show_ui'      => true,
				'has_archive'  => true
			]
		);

		$initiatives->taxonomy(
			[
				'name'     => 'campaign-year',
				'slug'     => 'campaign-year',
				'singular' => __( 'Campaign Year', 'give' ),
				'plural'   => __( 'Campaign Years', 'give' ),
			],
			[
				'show_in_rest' => true
			]
		);

		$initiatives->taxonomy(
			[
				'name'     => 'initiative-type',
				'slug'     => 'initiative-type',
				'singular' => __( 'Initiative Type', 'give' ),
				'plural'   => __( 'Initiative Types', 'give' ),
			],
			[
				'show_in_rest' => true
			]
		);

		$initiatives->taxonomy(
			[
				'name'     => 'initiator-type',
				'slug'     => 'initiator-type',
				'singular' => __( 'Initiator Type', 'give' ),
				'plural'   => __( 'Initiator Types', 'give' ),
			],
			[
				'show_in_rest' => true
			]
		);

		$initiatives->taxonomy(
			[
				'name'     => 'beneficiary-type',
				'slug'     => 'beneficiary-type',
				'singular' => __( 'Beneficiary Type', 'give' ),
				'plural'   => __( 'Beneficiary Types', 'give' ),
			],
			[
				'show_in_rest' => true
			]
		);

		$initiatives->taxonomy( 'post_tag' );

//        $initiatives->filters(['year', 'post_tag']);
	}
}